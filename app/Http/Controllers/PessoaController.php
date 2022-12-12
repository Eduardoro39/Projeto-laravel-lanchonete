<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PessoaController extends Controller
{   
    public function auth(Request $request){
        
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('inicio');
        }else{
            return redirect()->back()->with('danger', 'E-mail ou senha inválidos.');
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }
}
