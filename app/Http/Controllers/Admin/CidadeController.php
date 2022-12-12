<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $this->authorize('cidades_index');

        $cidades = Cidade::paginate(env('PAGINACAO'));
        return view('admin.cidades.index', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', Cidade::class);

        $action = route('admin.cidades.store');
        return view('admin.cidades.salvar', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $this->authorize('create', Cidade::class);

        Cidade::create($request->all());
        return redirect()->route('admin.cidades.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $this->authorize('update', Cidade::find($id));

        $cidade = Cidade::findOrFail($id);
        $action = route('admin.cidades.update', $cidade->id);
        return view('admin.cidades.salvar', compact('cidade', 'action'));
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
        //$this->authorize('update', Cidade::find($id));

        $cidade = Cidade::findOrFail($id);
        $cidade->update($request->all());
        return redirect()->route('admin.cidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->authorize('delete', Cidade::find($id));

        $cidade = Cidade::findOrFail($id);
        $cidade->delete();
        return redirect()->route('admin.cidades.index');
    }
}
