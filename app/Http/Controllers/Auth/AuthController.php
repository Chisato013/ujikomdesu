<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }
    //return view login
    public function login(){
        $title = "login|page";
        $tktk = "dkqdkwq";
    return view("auth.login",compact("title"));
    }

    //be login
    public function store(LoginRequest $request){
        $request->validated();
        return $this->authService->login($request->all());
    }
    public function logout(){
    return $this->authService->logout(request());
    }
}
