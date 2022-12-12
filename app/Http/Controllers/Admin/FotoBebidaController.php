<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoBebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idBebida)
    {
        $foto = Foto::join('bebidas', 'fotos.id', '=', 'bebidas.foto_id')->where('bebidas.id', '=', $idBebida)->first();
        return view('admin.bebidas.fotos.index', compact('foto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            if($request->foto->isValid()){
                $fotoUrl = $request->foto->store('bebidas', 'public');
                $foto = new Foto();
                $foto->url = $fotoUrl;
                $foto->save();

                return $foto->id;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idFoto)
    {
        $foto = Foto::find($idFoto);
        
        Storage::disk('public')->delete($foto->url);
        
        $foto->delete();
    }
}
