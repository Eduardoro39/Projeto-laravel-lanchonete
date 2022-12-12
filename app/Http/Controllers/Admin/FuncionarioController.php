<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Funcionario;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $funcionarios = Funcionario::join('cidades', 'cidades.id', '=', 'funcionarios.cidade_id')
        ->join('pessoas', 'pessoas.id', '=', 'funcionarios.pessoa_id')
        ->select('funcionarios.id', 'funcionarios.telefone', 'funcionarios.created_at', 'pessoas.nome as nome', 'pessoas.email as email', 'cidades.nome as cidade_nome');
        
        $cidade_id = $request->cidade_id;
        $nome = $request->nome;

        if($cidade_id){
            $funcionarios->where('cidades.id', $request->cidade_id);
        }
        
        if($nome){
            $funcionarios->where('pessoas.nome', 'like', "%$nome%");
        }

        $funcionarios = $funcionarios->paginate(env('PAGINACAO'))->withQueryString();

        $cidades = Cidade::orderBy('nome')->get();
        return view('admin.funcionarios.index', compact('funcionarios', 'cidades', 'nome', 'cidade_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        $action = route('admin.funcionarios.store');
        return view('admin.funcionarios.salvar', compact('cidades', 'action'));
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

        $request->merge(['funcionario' => 1]);

        $pessoa = Pessoa::create($request->all());
        $pessoa->funcionarios()->create($request->all());

        DB::Commit();

        $request->session()->flash('msg', 'Funcionario cadastrado com sucesso!');
        return redirect()->route('admin.funcionarios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::with(['pessoa', 'cidade'])->find($id);
        $cidades = Cidade::orderBy('nome')->get();
        $action = route('admin.funcionarios.update', $funcionario->id);
        return view('admin.funcionarios.salvar', compact('funcionario', 'cidades', 'action'));
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

        $request->merge(['funcionario' => 1]);

        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());
        $funcionario->pessoa->update($request->all());

        DB::Commit();

        $request->session()->flash('msg', 'Funcionario alterado com sucesso!');
        return redirect()->route('admin.funcionarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // DB::beginTransaction();

        // $funcionario = Funcionario::find($id);
        // $funcionario->delete();
        // $funcionario->pessoa->delete();

        // DB::Commit();

        // $request->session()->flash('msg', 'Funcionario deletado com sucesso!');
        // return redirect()->route('admin.funcionarios.index');

    }
}
