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
        Penilaian::where('id', $request->id)->delete();
        return redirect()->route('penilaian.show');
    }

    public function updatePenilaian(UpdatePenilaianRequest $request)
    {
        Penilaian::where('id', $request->id)->update($request->validated());
        return redirect()->route('penilaian.show');
    }
}
