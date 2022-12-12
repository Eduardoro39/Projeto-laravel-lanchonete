<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientes = Ingrediente::paginate(env('PAGINACAO'));
        return view('admin.ingredientes.index', compact('ingredientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.ingredientes.store');
        return view('admin.ingredientes.salvar', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ingrediente::create($request->all());
        return redirect()->route('admin.ingredientes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        $action = route('admin.ingredientes.update', $ingrediente->id);
        return view('admin.ingredientes.salvar', compact('ingrediente', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->update($request->all());
        return redirect()->route('admin.ingredientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->delete();
        return redirect()->route('admin.ingredientes.index');
    }
}
