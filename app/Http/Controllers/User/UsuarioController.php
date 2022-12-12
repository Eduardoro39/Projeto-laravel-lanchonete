<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\FotoUsuarioController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Pessoa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('user.usuarios.store');
        return view('user.usuarios.salvar', compact('action'));
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
        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Usuario::findOrFail($id));

        $usuario = Usuario::with(['foto', 'pessoa'])->findOrFail($id);
        return view('user.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Usuario::findOrFail($id));

        $usuario = Usuario::with(['pessoa'])->findOrFail($id);
        $action = route('user.usuarios.update', $usuario->id);
        return view('user.usuarios.salvar', compact('usuario', 'action'));
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
        $this->authorize('update', Usuario::findOrFail($id));

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
        return redirect()->route('inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('delete', Usuario::findOrFail($id));

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
        return redirect()->route('inicio');
    }
}
