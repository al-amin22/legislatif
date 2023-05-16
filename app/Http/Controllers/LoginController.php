<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\AlamatTps;
use App\Models\Tps;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->role == 0) {
        return redirect()->route('home'); // Redirect ke halaman home jika role adalah 0 (misalnya role pengguna biasa)
    } elseif ($user->role == 1) {
        return redirect()->route('admin.dashboard'); // Redirect ke halaman admin jika role adalah 1 (misalnya role admin)
    } else {
        return redirect()->route('login'); // Redirect ke halaman login jika role tidak valid
    }
}

    public function showRegisterForm()
    {
        $alamat_tps = AlamatTps::all();
     
        return view('auth.register',  compact('alamat_tps'));
    }

        public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'nama_user' => $request->input('nama_user'),
            'alamat_user' => $request->input('alamat_user'),
            'wa_user' => $request->input('wa_user'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'tps_id' => $request->input('tps'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 1, // Set role user menjadi 1
        ]);

        Auth::login($user); // Login user setelah berhasil mendaftar



        return redirect()->route('chart');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getTps(Request $request)
    {
        $tps = Tps::where('alamat_tps_id', $request->alamat_tps_id)->pluck('nomor_tps', 'id');
        return response()->json($tps);
    }

}
