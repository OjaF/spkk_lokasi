<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianRequest;
use App\Http\Requests\UpdatePenilaianRequest;
use App\Models\Penilaian;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    function calculate_rank($rank_values): array {
        $rank = [];
        $temp = $rank_values;
        rsort($temp);
        $rank = array_map(function($value) use ($temp) {
            return array_search($value, $temp) + 1;
        }, $rank_values);
        return $rank;
    }

    public function penilaianPage(Request $request)
    {
        $page = 10;
        if ($request->q != null) {
            $page = $request->q;
        }


        $dataAlternatif = Alternatif::where('nama_alternatif', 'LIKE', '%' . $request->search_query . '%')
        ->paginate($page);

        return view('penilaian.showpenilaian', ['dataAlternatif' => $dataAlternatif]);
    }

    public function penilaianDetailPage($id){
        $alternatif = Alternatif::where('id', $id)->first();
        $dataKriteria = Kriteria::where('role', Auth::user()->role)->get();

        foreach ($dataKriteria as $key => $kriteria) {
            $dataKriteria[$key]->subkriteria = SubKriteria::where('id_kriteria', $kriteria->id)->orderByDesc('nilai')->get();
        }

        return view('penilaian.detailpenilaian', ['dataKriteria' => $dataKriteria, 'alternatif' => $alternatif]);
    }

    public function createPenilaian(StorePenilaianRequest $request)
    {
        $role = Auth::user()->role;
        $alternatif = Alternatif::where('id', $request->id_alternatif)->first();
        $allKriteria = Kriteria::where('role', Auth::user()->role)->get();

        DB::beginTransaction();
        try {
            foreach ($allKriteria as $kriteria) {
                $nilai = $request->input($kriteria->id);
                
                Penilaian::create([
                    'id_alternatif' => $request->id_alternatif,
                    'role' => $role,
                    'id_kriteria' => $kriteria->id,
                    'nilai' => $nilai
                ]);
            }

            if($role == 'marketing'){
                $alternatif->marketing = true;
            } else if($role == 'finance'){
                $alternatif->finance = true;
            } else if($role == 'stakeholder'){
                $alternatif->stakeholder = true;
            }

            $alternatif->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }

        return redirect()->route('penilaian.show');
    }

    public function deletePenilaian(StorePenilaianRequest $request)
    {
        DB::beginTransaction();
        try {
            $penilaian = Penilaian::where('id_alternatif', $request->id_alternatif)->where('role', $request->role)->delete();
            $alternatif = Alternatif::where('id', $request->id_alternatif)->update([
                $request->role => false,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            //throw $th
        }
        return redirect()->route('penilaian.show');
    }

    public function getData($id)
    {
        // $dataPenilaian = Penilaian::where('id_alternatif', $id)->where('role', Auth::user()->role)->get();
        $data = DB::table('penilaians')
                    ->leftJoin('kriterias', 'penilaians.id_kriteria', '=', 'kriterias.id')
                    ->where('id_alternatif', $id)->where('penilaians.role', Auth::user()->role)->get(["id_kriteria","nama_kriteria", "nilai"]);

        foreach ($data as $penilaian) {
            $datasubkriteria = DB::table('sub_kriterias')
                                ->where('id_kriteria', $penilaian->id_kriteria)
                                ->where('nilai', $penilaian->nilai)
                                ->first();
            $penilaian->subkriteria = $datasubkriteria->nama_subkriteria;
        }

        return response()->json($data);
    }

    public function hasilPerhitungan($role){
        $dataAlternatif = Alternatif::all();
        $dataKriteria = Kriteria::where('role', Auth::user()->role)->get();

        $dataTambahan = [];

        // Ambil data penilaian
        foreach ($dataAlternatif as $key => $alternatif) {
            $dataAlternatif[$key]->penilaian = DB::table('penilaians')
                                            ->leftJoin('kriterias', 'penilaians.id_kriteria', '=', 'kriterias.id')
                                            ->where('id_alternatif', $alternatif->id)
                                            ->where('penilaians.role', Auth::user()->role)
                                            ->get()->toArray();
        }
        $matriks["matriks_nilai_alternatif"] = unserialize(serialize($dataAlternatif));

        // Normalisasi Alternatif
        foreach ($dataAlternatif as $alternatif) {
            foreach ($alternatif->penilaian as $penilaian) {
                $penilaian->nilai = $penilaian->nilai*$penilaian->nilai;
            }
        }
        $matriks["matriks_normalisasi_alternatif_kuadrat"] = unserialize(serialize($dataAlternatif));

        $jumlah = [];
        foreach ($dataAlternatif[0]->penilaian as $key => $kriteria) {
            $sum = 0;
            foreach ($dataAlternatif as $alternatif) {
                $sum += $alternatif->penilaian[$key]->nilai;
            }
            $jumlah[$key] = $sum;
        }
        $dataTambahan["matriks_normalisasi_alternatif_kuadrat"] = $jumlah;

        // Normalisasi Alternatif
        foreach ($dataAlternatif as $alternatif) {
            foreach ($alternatif->penilaian as $key => $penilaian) {
                $penilaian->nilai = sqrt($penilaian->nilai)/sqrt($dataTambahan["matriks_normalisasi_alternatif_kuadrat"][$key]);
            }
        }
        $matriks["matriks_normalisasi_alternatif_dibagi_kuadrat"] = unserialize(serialize($dataAlternatif));

        // Normalisasi Bobot
        foreach ($dataAlternatif as $key => $alternatif) {
            foreach ($alternatif->penilaian as $penilaian) {
                $penilaian->nilai = $penilaian->nilai*$penilaian->bobot;
            }
        }
        $matriks["matriks_normalisasi_alternatif_terbobot"] = unserialize(serialize($dataAlternatif));

        // Perhitungan Solusi Ideal Positif dan Negatif
        $solusiIdealPositif = [];
        $solusiIdealNegatif = [];
        foreach ($dataAlternatif[0]->penilaian as $key => $kriteria) {
            $max = 0;
            $min = 1000000000;
            foreach ($dataAlternatif as $alternatif) {
                if($alternatif->penilaian[$key]->nilai > $max){
                    $max = $alternatif->penilaian[$key]->nilai;
                }
                if($alternatif->penilaian[$key]->nilai < $min){
                    $min = $alternatif->penilaian[$key]->nilai;
                }
            }

            if($dataKriteria[$key]->atribut == 'benefit'){
                $solusiIdealPositif[$key] = $max;
                $solusiIdealNegatif[$key] = $min;
            } else {
                $solusiIdealPositif[$key] = $min;
                $solusiIdealNegatif[$key] = $max;
            }
        }

        $dataTambahan["solusi_ideal_positif"] = $solusiIdealPositif;
        $dataTambahan["solusi_ideal_negatif"] = $solusiIdealNegatif;

        // Perhitungan Jarak Alternatif dengan Solusi Ideal Positif dan Negatif
        $solusiIdeal = [];
        foreach ($dataAlternatif as $key => $alternatif) {
            $data["positif"] = 0;
            $data["negatif"] = 0;
            foreach ($alternatif->penilaian as $key => $kriteria) {
                $data["positif"] += pow($kriteria->nilai - $solusiIdealPositif[$key], 2);
                $data["negatif"] += pow($kriteria->nilai - $solusiIdealNegatif[$key], 2);
            }

            array_push($solusiIdeal, $data);
        }

        $dataTambahan["selisih_solusi_ideal"] = $solusiIdeal;

        // Kuadrat Selisih Solusi Ideal
        foreach ($solusiIdeal as $key => $solusi) {
            $solusiIdeal[$key]["positif"] = sqrt($solusi["positif"]);
            $solusiIdeal[$key]["negatif"] = sqrt($solusi["negatif"]);
        }

        $dataTambahan["kuadrat_selisih_solusi_ideal"] = $solusiIdeal;

        // Perhitungan nilai preferensi
        $nilaiPreferensi = [];
        foreach ($solusiIdeal as $key => $solusi) {
            $nilaiPreferensi[$key] = $solusi["negatif"]/($solusi["positif"]+$solusi["negatif"]);
        }
        $dataTambahan["nilai_preferensi"] = $nilaiPreferensi;
        $dataTambahan["rank"] = $this->calculate_rank($nilaiPreferensi);
        

        // dd($solusiIdeal);

        return view('penilaian.hasilperhitungan', ['matriks' => $matriks, 'dataTambahan' => $dataTambahan]);
    }
}
