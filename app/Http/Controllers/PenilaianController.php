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

    function getPenilaianTopsis($role) {
        $dataAlternatif = Alternatif::all();
        $dataKriteria = Kriteria::where('role', $role)->get();

        $dataTambahan = [];

        // Ambil data penilaian
        foreach ($dataAlternatif as $key => $alternatif) {
            $dataAlternatif[$key]->penilaian = DB::table('penilaians')
                                            ->leftJoin('kriterias', 'penilaians.id_kriteria', '=', 'kriterias.id')
                                            ->where('id_alternatif', $alternatif->id)
                                            ->where('penilaians.role', $role)
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

        // Hitung jumlah nilai setiap kriteria
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

        // Akar Kuadrat Selisih Solusi Ideal
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

        $result = [
            'matriks' => $matriks,
            'dataTambahan' => $dataTambahan
        ];

        return $result; 
    }

    function getHasilTopsis($role) {
        $finalResult = [];
        $topsis = $this->getPenilaianTopsis($role);
        $preferensi = $topsis['dataTambahan']['nilai_preferensi'];
        $rank = $topsis['dataTambahan']['rank'];
        $alternatif = Alternatif::all();

        foreach ($preferensi as $key => $value) {
            $finalResult[$key] = [
                'nilai_preferensi' => $value,
                'rank' => $rank[$key],
                'nama_alternatif' => $alternatif[$key]->nama_alternatif
            ];
        }

        return $finalResult;
    }

    function getPenilaianBorda() {
        $dataAlternatif = Alternatif::all();

        // Ambil data penilaian marketing
        $topsisMarketing = $this->getPenilaianTopsis('marketing');
        $preferensiMarketing = $topsisMarketing['dataTambahan']['nilai_preferensi'];
        $rankMarketing = $topsisMarketing['dataTambahan']['rank'];

        // Ambil data penilaian finance
        $topsisFinance = $this->getPenilaianTopsis('finance');
        $preferensiFinance = $topsisFinance['dataTambahan']['nilai_preferensi'];
        $rankFinance = $topsisFinance['dataTambahan']['rank'];

        // Ambil data penilaian stakeholder
        $topsisStakeholder = $this->getPenilaianTopsis('stakeholder');
        $preferensiStakeholder = $topsisStakeholder['dataTambahan']['nilai_preferensi'];
        $rankStakeholder = $topsisStakeholder['dataTambahan']['rank'];

        foreach ($dataAlternatif as $key => $alternatif) {
            for ($i=1; $i <= count($dataAlternatif); $i++) { 
                $alternatif[$i] = 0;
            }

            $alternatif[$rankMarketing[$key]] += $preferensiMarketing[$key];
            $alternatif[$rankFinance[$key]] += $preferensiFinance[$key];
            $alternatif[$rankStakeholder[$key]] += $preferensiStakeholder[$key];
        }

        $pointBorda = [];
        foreach ($dataAlternatif as $key => $alternatif) {
            for ($i=1; $i <= count($dataAlternatif); $i++) { 
                $alternatif[$i] = $alternatif[$i]*(count($dataAlternatif)-$i+1);
            }

            $sum = 0;
            for ($i=1; $i <= count($dataAlternatif); $i++) { 
                $sum += $alternatif[$i];
            }

            array_push($pointBorda, $sum);
        }

        $nilaiBorda = [];
        $totalPointBorda = array_sum($pointBorda);
        foreach ($pointBorda as $key => $point) {
            array_push($nilaiBorda, $point/$totalPointBorda);
        }

        $rankBorda = $this->calculate_rank($nilaiBorda);

        foreach ($dataAlternatif as $key => $alternatif) {
            $alternatif["point_borda"] = $pointBorda[$key];
            $alternatif["nilai_borda"] = $nilaiBorda[$key];
            $alternatif["rank_borda"] = $rankBorda[$key];
        }

        return $dataAlternatif;
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
        $alternatif = Alternatif::all();
        $allgreen = true;

        foreach ($alternatif as $key => $value) {
            if($value->marketing == false){
                $allgreen = false;
            }

            if($value->finance == false){
                $allgreen = false;
            }

            if($value->stakeholder == false){
                $allgreen = false;
            }
        }

        if ($allgreen == false) {
            return view('penilaian.hasilperhitungan', ['allgreen' => $allgreen])->withErrors(['error' => 'Data penilaian belum lengkap']);
        }

        try {
            $result = $this->getPenilaianTopsis($role);
            $matriks = $result['matriks'];
            $dataTambahan = $result['dataTambahan'];
        } catch (\Throwable $th) {
            return view('penilaian.hasilperhitungan', ['allgreen' => false])->withErrors(['error' => 'Data penilaian belum lengkap']);
        }
        
        return view('penilaian.hasilperhitungan', ['matriks' => $matriks, 'dataTambahan' => $dataTambahan, 'allgreen' => $allgreen]);
    }

    public function hasilAkhir($role) {
        $alternatif = Alternatif::all();
        $allgreen = true;

        foreach ($alternatif as $key => $value) {
            if($value->marketing == false){
                $allgreen = false;
            }

            if($value->finance == false){
                $allgreen = false;
            }

            if($value->stakeholder == false){
                $allgreen = false;
            }
        }

        if ($allgreen == false) {
            return view('penilaian.hasilperhitungan', ['allgreen' => $allgreen])->withErrors(['error' => 'Data penilaian belum lengkap']);
        }

        try {
            $hasil = $this->getPenilaianBorda();

            $dataTopsis = [];
            $dataTopsis['marketing'] = $this->getHasilTopsis('marketing');
            $dataTopsis['finance'] = $this->getHasilTopsis('finance');
            $dataTopsis['stakeholder'] = $this->getHasilTopsis('stakeholder');
        } catch (\Throwable $th) {
            return view('penilaian.hasilperhitungan', ['allgreen' => false])->withErrors(['error' => 'Data penilaian belum lengkap']);
        }

        return view('penilaian.hasilakhir', ['allgreen' => $allgreen, 'hasil' => $hasil, 'dataTopsis' => $dataTopsis]);
    } 
}
