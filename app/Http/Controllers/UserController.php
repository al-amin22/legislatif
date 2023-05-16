<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Panduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    // KELOLA AKUN SAKSI
    public function createSaksi()
    {
        return view('admin.create_saksi');
    }

    public function storeSaksi(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);
        $saksi = User::where('role',1)->get();
        // dd(dcryp)
        // dd(dec)
        return redirect()->route('usersaksiData',compact('saksi'));
    }
    public function dataSaksi()
    {
        $saksi = User::where('id','>',5)->where('role',1)->get();
        return view('admin.data_saksi', compact('saksi'));
    }



    // KELOLA AKUN SISWA
    public function createTimses()
    {
        return view('admin.create_timses');
    }
    public function storeTimses(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        $timses = User::where('role',2)->get();
        return redirect()->route('usertimses', compact('siswa'));
    }
    public function dataTimses()
    {
        $timses = User::where('role',2)->get();
        return view('admin.data_timses', compact('timses'));
    }
    

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function logout()
    {
      auth()->logout();

      return redirect()->route('login')->with('alert','Anda tidak boleh memasuki halaman tersebut');//->route('login')
    }
}
