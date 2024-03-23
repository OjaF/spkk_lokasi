<?php

namespace App\Http\Controllers;

use App\Http\Requests\UbahPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Ubah password
     * @return \Illuminate\View\View
     */
    public function ubahPasswordPage(){
        return view("user.ubahpassword");
    }

    public function ubahPassword(UbahPasswordRequest $request){

        $validated = $request->validated();

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return redirect()->back()->withErrors(["error" => "Password lama tidak sesuai"]);
        }

        // Ubah password
        User::where("id", Auth::user()->id)->update(["password"=> Hash::make($validated["new_password"])]);

        return redirect()->back()->with('message', 'Password berhasil diubah');
    }
}
