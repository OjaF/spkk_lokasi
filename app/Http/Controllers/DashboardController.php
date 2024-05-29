<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PenilaianController;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboardPage()
    {
        try {
            $penilaian = new PenilaianController();
            $hasil = $penilaian->getPenilaianBorda();

            $nama = [];
            $rank = [];
            $skor = [];
            foreach ($hasil as $key => $value) {
                $nama[] = $value->nama_alternatif;
                $rank[] = $value->rank_borda;
                $skor[] = $value->nilai_borda;
            }

            array_multisort($rank, $nama, $skor);

            $hasil = [];
            $hasil['nama_alternatif'] = $nama;
            $hasil['rank_borda'] = $rank;
            $hasil['skor_borda'] = $skor;
        } catch (\Throwable $th) {
            $hasil = null;
        }

        $data = [];
        $data["kriteria"] = Kriteria::where('role', Auth::user()->role)->count();
        $data["subkriteria"] = SubKriteria::where('role', Auth::user()->role)->count();
        $data["alternatif"] =  Alternatif::all()->count();

        return view('dashboard', ['rank' => $hasil, 'data' => $data]);
    }
}
