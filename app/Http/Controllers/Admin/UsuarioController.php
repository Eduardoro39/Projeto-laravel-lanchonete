<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Pessoa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with(['pessoa'])->paginate(env('PAGINACAO'));
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.usuarios.store');
        return view('admin.usuarios.salvar', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        DB::beginTransaction();

        $request->merge(['funcionario' => 0]);
        
        if($request->hasFile('foto')){
            $fotoUsuarioController = new FotoUsuarioController();
            $idFoto = $fotoUsuarioController->store($request);
            $request->merge(['foto_id' => $idFoto]);
        }

        $pessoa = Pessoa::create($request->all());
        $pessoa->usuarios()->create($request->all());

        DB::Commit();

        $request->session()->flash('msg', 'Usuario cadastrado com sucesso!');
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::with(['pessoa'])->findOrFail($id);
        $action = route('admin.usuarios.update', $usuario->id);
        return view('admin.usuarios.salvar', compact('usuario', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        DB::beginTransaction();

        $request->merge(['funcionario' => 0]);

        $usuario = Usuario::findOrFail($id);

        if($request->hasFile('foto')){
            $idFotoAntiga = $usuario->foto_id; // Salva o id da foto para depois que trocar de foto, poder excluir a foto antiga

            $fotoUsuarioController = new FotoUsuarioController();
            $idFoto = $fotoUsuarioController->store($request);
            $request->merge(['foto_id' => $idFoto]);
        }

        $usuario->update(array_filter($request->all())); // array_filter remove os campos que estão vazios
        $usuario->pessoa->update(array_filter($request->all()));

        if($request->hasFile('foto') && $idFotoAntiga != null)
            $fotoUsuarioController->destroy($idFotoAntiga); // Exclui a foto antiga

        DB::Commit();

        $request->session()->flash('msg', 'Usuario alterado com sucesso!');
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        $usuario->pessoa->delete();

        if($usuario->foto){
            $fotoUsuarioController = new FotoUsuarioController();
            $fotoUsuarioController->destroy($usuario->foto_id);
        }

        DB::Commit();

        $request->session()->flash('msg', 'Usuario deletado com sucesso!');
        return redirect()->route('admin.usuarios.index');
    }
    
}
