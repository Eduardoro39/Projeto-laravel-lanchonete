<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comida;
use Illuminate\Http\Request;

class ComidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comidas = Comida::with(['ingredientes'])->paginate(env('PAGINACAO'));
        return view('user.comidas.index', compact('comidas'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comida = Comida::with(['foto', 'ingredientes'])->findOrFail($id);
        return view('user.comidas.show', compact('comida'));
    }
    
}
