<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKriteriaRequest;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Menampilkan halaman kriteria
     */
    public function kriteriaPage(Request $request){
        
        $page = 10;
        if ($request->q != null) {
            $page = $request->q;
        }

        $dataKriteria = Kriteria::where('role', Auth::user()->role)
        ->where('nama_kriteria', 'LIKE', '%' . $request->search_query . '%')
        ->paginate($page);

        return view('kriteria.showkriteria', [
            'dataKriteria' => $dataKriteria
        ]);
    }

    /**
     * Menambah kriteria
     * @param CreateKriteriaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createKriteria(CreateKriteriaRequest $request){
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            Kriteria::create([
                'nama_kriteria' => $validated['nama'],
                'bobot' => $validated['bobot'],
                'role' => $validated['role'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            Db::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan, Kriteria gagal ditambahkan']);
        }

        return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan');
    }
    
    /**
     * Menghapus kriteria
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteKriteria(Request $request){
        $validated = $request->validate([
            'id' => 'required|exists:kriterias,id'
        ]);

        $kriteria = Kriteria::find($validated['id']);

        if ($kriteria == null) {
            return redirect()->back()->withErrors(['error' => 'Kriteria tidak ditemukan']);
        }

        DB::beginTransaction();
        try {
            $kriteria->delete();
            DB::commit();
        } catch (\Throwable $th) {
            Db::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan, Kriteria gagal dihapus']);
        }

        return redirect()->back()->with('success', 'Kriteria berhasil dihapus');
    }

    /**
     * Mengubah kriteria
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateKriteria(Request $request){
        $validated = $request->validate([
            'id' => 'required|exists:kriterias,id',
            'nama' => 'required',
            'bobot' => 'required',
        ]);

        $kriteria = Kriteria::find($validated['id']);

        if ($kriteria == null) {
            return redirect()->back()->withErrors(['error' => 'Kriteria tidak ditemukan']);
        }

        DB::beginTransaction();
        try {
            $kriteria->update([
                'nama_kriteria' => $validated['nama'],
                'bobot' => $validated['bobot'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            Db::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan, Kriteria gagal diubah']);
        }

        return redirect()->back()->with('success', 'Kriteria berhasil diubah');
    }
}
