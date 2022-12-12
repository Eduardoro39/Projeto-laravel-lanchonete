<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bebida;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bebidas = Bebida::with(['medida'])->paginate(env('PAGINACAO'));
        return view('user.bebidas.index', compact('bebidas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bebida = Bebida::with(['foto', 'medida'])->findOrFail($id);
        return view('user.bebidas.show', compact('bebida'));
    }

}
