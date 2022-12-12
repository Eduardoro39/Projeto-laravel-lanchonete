<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comida;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.comidas.index', compact('comidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredientes = Ingrediente::all();

        $action = route('admin.comidas.store');
        return view('admin.comidas.salvar', compact('action', 'ingredientes'));
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
        
        $fotoComidaController = new FotoComidaController();
        $idFoto = $fotoComidaController->store($request);
        $request->merge(['foto_id' => $idFoto]);

        $comida = Comida::create($request->all());
        
        if($request->has('ingredientes')){

            $ingredientes = collect($request->input('ingredientes', []))
            ->map(function($ingrediente){
                return ['quantidade' => $ingrediente];
            });

            $comida->ingredientes()->sync($ingredientes);
        }

        DB::Commit();

        return redirect()->route('admin.comidas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comida = Comida::findOrFail($id);

        // Pega todos os ingredientes e atribui nele a quantidade que esta na tabela comida_ingrediente se ele tiver
        $ingredientes = Ingrediente::get()->map(function($ingrediente) use ($comida){
            $ingrediente->value = data_get($comida->ingredientes->firstWhere('id', $ingrediente->id), 'pivot.quantidade') ?? null;
            return $ingrediente;
        });

        $action = route('admin.comidas.update', $comida->id);
        return view('admin.comidas.salvar', compact('comida', 'action', 'ingredientes'));
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

        $comida = Comida::findOrFail($id);

        $idFotoAntiga = $comida->foto_id; // Salva o id da foto para depois que trocar de foto, poder excluir a foto antiga

        $fotoComidaController = new FotoComidaController();
        $idFoto = $fotoComidaController->store($request);
        $request->merge(['foto_id' => $idFoto]);
        
        $comida->update($request->all());

        if($request->has('ingredientes')){

            $ingredientes = collect($request->input('ingredientes', []))
            ->map(function($ingrediente){
                return ['quantidade' => $ingrediente];
            });

            $comida->ingredientes()->sync($ingredientes);
        }

        $fotoComidaController->destroy($idFotoAntiga); // Exclui a foto antiga

        DB::Commit();
        
        return redirect()->route('admin.comidas.index');
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
        
        $comida = Comida::findOrFail($id);
        $comida->ingredientes()->detach();
        $comida->delete();

        $fotoComidaController = new FotoComidaController();
        $fotoComidaController->destroy($comida->foto_id);

        DB::Commit();

        return redirect()->route('admin.comidas.index');
    }
}
