<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Medida::paginate(env('PAGINACAO'));
        return view('admin.medidas.index', compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.medidas.store');
        return view('admin.medidas.salvar', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Medida::create($request->all());
        return redirect()->route('admin.medidas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medida = Medida::findOrFail($id);
        $action = route('admin.medidas.update', $medida->id);
        return view('admin.medidas.salvar', compact('medida', 'action'));
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
        $medida = Medida::findOrFail($id);
        $medida->update($request->all());
        return redirect()->route('admin.medidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medida = Medida::findOrFail($id);
        $medida->delete();
        return redirect()->route('admin.medidas.index');
    }
}
