<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UbahPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{
    /**
     * Menampilkan halaman user
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function userPage(Request $request)
    {
        $page = 10;
        if ($request->q != null) {
            $page = $request->q;
        }

        $dataUser = User::where('username', 'LIKE', '%' . $request->search_query . '%')
            ->orWhere('name', 'LIKE', '%' . $request->search_query . '%')
            ->paginate($page);


        return view('user.showuser', ['dataUser' => $dataUser]);
    }

    /**
     * Ubah password
     * @return \Illuminate\View\View
     */
    public function ubahPasswordPage()
    {
        return view("user.ubahpassword");
    }

    /**
     * Ubah password
     * @param UbahPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ubahPassword(UbahPasswordRequest $request)
    {

        $validated = $request->validated();

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->withErrors(["error" => "Password lama tidak sesuai"]);
        }

        DB::beginTransaction();
        try {
            // Ubah password
            User::where("id", Auth::user()->id)->update(["password" => Hash::make($validated["new_password"])]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors('message', 'Gagal mengubah password');
        }

        return redirect()->back()->with('message', 'Password berhasil diubah');
    }

    /**
     * Hapus user
     */
    public function deleteUser(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|exists:users,username',
        ]);

        DB::beginTransaction();
        try {
            User::where("username", $validated["username"])->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal menghapus user');
        }

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }

    /**
     * Menampilkan halaman tambah user
     * @return \Illuminate\View\View
     */
    public function createUser(CreateUserRequest $request){
        $validated = $request->validated();
        
        DB::beginTransaction();
        try {
            User::create([
                'username'=> $validated['username'],
                'name' => $validated['name'],
                'password' => $validated['password'],
                'role' => $validated['role'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal menambahkan user');
        }

        return redirect()->back()->with('success', 'User berhasil ditambahkan');
    }
}
