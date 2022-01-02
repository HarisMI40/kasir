<?php

namespace App\Http\Controllers\akun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class akunController extends Controller
{
    public function index(){
        return view('akun.index');
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $request->user()->fill([
            'name' => $request->nama,
            'email' => $request->email,
        ])->save();

        $request->session()->flash('success_update_data', 'Sukes Merubah Data Akun !');

        return redirect()->back();
    }

    public function update_password(Request $request){
        $validatedData = $request->validate([
            'password_lama' => ['required', 'current_password'],
            'password_baru' => ['required'],
        ]);

        $request->user()->fill([
            'password' => Hash::make($request->password_baru)
        ])->save();

        $request->session()->flash('success_update_password', 'Sukes Merubah Password Akun!');

        return redirect()->back();
    }
}
