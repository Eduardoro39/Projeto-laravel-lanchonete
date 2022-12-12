<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bebida;
use App\Models\Medida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.bebidas.index', compact('bebidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medidas = Medida::all();
        $action = route('admin.bebidas.store');
        return view('admin.bebidas.salvar', compact('medidas', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $fotoBebidaController = new FotoBebidaController();
        $idFoto = $fotoBebidaController->store($request);
        $request->merge(['foto_id' => $idFoto]);

        Bebida::create($request->all());

        DB::Commit();

        return redirect()->route('admin.bebidas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bebida = Bebida::findOrFail($id);
        $medidas = Medida::all();
        $action = route('admin.bebidas.update', $bebida->id);
        return view('admin.bebidas.salvar', compact('bebida', 'medidas', 'action'));
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
        DB::beginTransaction();

        $bebida = Bebida::findOrFail($id);

        $idFotoAntiga = $bebida->foto_id; // Salva o id da foto para depois que trocar de foto, poder excluir a foto antiga

        $fotoBebidaController = new FotoBebidaController();
        $idFoto = $fotoBebidaController->store($request);
        $request->merge(['foto_id' => $idFoto]);

        $bebida->update($request->all());

        $fotoBebidaController->destroy($idFotoAntiga); // Exclui a foto antiga
        
        DB::Commit();

        return redirect()->route('admin.bebidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        $bebida = Bebida::findOrFail($id);
        $bebida->delete();

        $fotoBebidaController = new FotoBebidaController();
        $fotoBebidaController->destroy($bebida->foto_id);

        DB::Commit();
        
        return redirect()->route('admin.bebidas.index');
    }
}
