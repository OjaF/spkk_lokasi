<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PenilaianController;

class DashboardController extends Controller
{
    public function dashboardPage()
    {
        try {
            $penilaian = new PenilaianController();
            $hasil = $penilaian->getPenilaianBorda();
            // dd($hasil);

            $nama = [];
            $rank = [];
            foreach ($hasil as $key => $value) {
                $nama[] = $value->nama_alternatif;
                $rank[] = $value->rank_borda;
            }

            array_multisort($rank, $nama);

            $hasil = [];
            $hasil['nama_alternatif'] = $nama;
            $hasil['rank_borda'] = $rank;
        } catch (\Throwable $th) {
            $hasil = null;
        }

        // dd($hasil);
        return view('dashboard', ['rank' => $hasil]);
    }
}
