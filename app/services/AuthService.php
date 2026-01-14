<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class AuthService{
    public function login(array $data)
    {
        if(Auth::attempt(["email" => $data["email"],"password" => $data["password"]])){
            session()->regenerate();
            return redirect()->intended(Route::has('dashboard'));
        }
        return back()->withErrors([
            'email' => 'email atau password salah',
        ])->onlyInput('email');
    }
    public function logout($request){
        FacadesAuth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route("login")->with("sukses","berhasil logout");
    }
}
