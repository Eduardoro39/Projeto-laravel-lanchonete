<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use App\Models\Comida;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        $comidas = Comida::limit(10)->get();
        $bebidas = Bebida::with(['foto', 'medida'])->limit(10)->get();
        return view('home', compact('comidas','bebidas'));
    }

}
