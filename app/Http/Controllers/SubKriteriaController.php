<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubKriteriaRequest;
use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Menampilkan halaman subkriteria
     * @return \Illuminate\View\View
     * */
    public function subkriteriaPage()
    {
        $dataKriteria = Kriteria::where('role', Auth::user()->role)->get();

        foreach ($dataKriteria as $key => $kriteria) {
            $dataKriteria[$key]->subkriteria = SubKriteria::where('id_kriteria', $kriteria->id)->orderByDesc('nilai')->get();
        }

        return view('subkriteria.showsubkriteria', ['dataKriteria' => $dataKriteria]);
    }

    /**
     * Menambahkan sub-kriteria
     * @param CreateSubKriteriaRequest $request
     */
    public function addSubkriteria(CreateSubKriteriaRequest $request){
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            SubKriteria::create([
                'id_kriteria' => $validated['kriteria'],
                'nama_subkriteria' => $validated['nama'],
                'nilai' => $validated['nilai'],
                'role' => $validated['role'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan, Sub Kriteria gagal ditambahkan']);
        }

        return redirect()->back()->with('success', 'Sub Kriteria berhasil ditambahkan');
    }

    /**
     * Menghapus sub-kriteria   
     * @param Request $request
     */
    public function deleteSubkriteria(Request $request){
        $id = $request->input('id');

        DB::beginTransaction();
        try {
            SubKriteria::where('id', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan, Sub Kriteria gagal dihapus']);
        }

        return redirect()->back()->with('success', 'Sub Kriteria berhasil dihapus');
    }

    /**
     * Mengubah sub-kriteria
     * @param Request $request
     */
    public function updateSubkriteria(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'nama' => 'required|string',
            'nilai' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            SubKriteria::where('id', $validated['id'])->update([
                'nama_subkriteria' => $validated['nama'],
                'nilai' => $validated['nilai'],
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan, Sub Kriteria gagal diubah']);
        }

        return redirect()->back()->with('success', 'Sub Kriteria berhasil diubah');
    }
}
