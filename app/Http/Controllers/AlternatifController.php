<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAlternatifRequest;
use App\Models\Alternatif;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlternatifController extends Controller
{
    /**
     * Menampilkan daftar alternatif
     */
    public function alternatifPage(Request $request){
        $page = 10;
        if ($request->q != null) {
            $page = $request->q;
        }


        $dataAlternatif = Alternatif::where('nama_alternatif', 'LIKE', '%' . $request->search_query . '%')
        ->paginate($page);

        return view('alternatif.showalternatif', ['dataAlternatif' => $dataAlternatif]);
    }

    /**
     * Menampilkan form tambah alternatif
     * @param CreateAlternatifRequest $request
     */
    public function addAlternatif(CreateAlternatifRequest $request){
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            Alternatif::create([
                'kode' => $validated['kode'],
                'nama_alternatif' => $validated['nama_alternatif'],
                'keterangan' => $validated['keterangan'],
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return redirect()->back()->withErrors('error', 'Gagal menambahkan alternatif');
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan alternatif');
    }

    /**
     * Menghapus alternatif
     * @param Request $request
     */
    public function deleteAlternatif(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer'
        ]);

        DB::beginTransaction();
        try {
            Alternatif::where('id', $validated['id'])->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('error', 'Gagal menghapus alternatif');
        }

        return redirect()->back()->with('success', 'Berhasil menghapus alternatif');
    }

    /**
     * Mengupdate alternatif
     * @param Request $request
     */
    public function updateAlternatif(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'kode' => 'required|string',
            'nama_alternatif' => 'required|string',
            'keterangan' => 'string|nullable'
        ]);

        DB::beginTransaction();
        try {
            Alternatif::where('id', $validated['id'])->update([
                'kode' => $validated['kode'],
                'nama_alternatif' => $validated['nama_alternatif'],
                'keterangan' => $validated['keterangan'],
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return redirect()->back()->withErrors('error', 'Gagal mengupdate alternatif');
        }

        return redirect()->back()->with('success', 'Berhasil mengupdate alternatif');
    }
}
