<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use App\Models\Cidade;
use App\Models\Comida;
use App\Models\Funcionario;
use App\Models\Ingrediente;
use App\Models\Medida;
use App\Models\Usuario;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        $usuariosCadastradosHoje = Usuario::with(['pessoa'])->whereDate('created_at', Carbon::today())->get();
        $comidasCadastradasHoje = Comida::whereDate('created_at', Carbon::today())->get();
        $bebidasCadastradasHoje = Bebida::whereDate('created_at', Carbon::today())->get();

        $funcionariosCadastradosHoje = Funcionario::whereDate('created_at', Carbon::today())->get();
        $ingredientesCadastradosHoje = Ingrediente::whereDate('created_at', Carbon::today())->get();
        $medidasCadastradasHoje = Medida::whereDate('created_at', Carbon::today())->get();
        $cidadesCadastradasHoje = Cidade::whereDate('created_at', Carbon::today())->get();
        
        $dadosProChart = [
            ['Tabela', 'Quantidade'],
            ['Usuarios', Usuario::all()->count()],
            ['Comidas', Comida::all()->count()],
            ['Bebidas', Bebida::all()->count()],
            ['Funcionários', Funcionario::all()->count()],
            ['Ingredientes', Ingrediente::all()->count()],
            ['Medidas', Medida::all()->count()],
            ['Cidades', Cidade::all()->count()],
        ];

        return view('dashboard', compact('usuariosCadastradosHoje', 'comidasCadastradasHoje', 'bebidasCadastradasHoje', 'funcionariosCadastradosHoje', 'ingredientesCadastradosHoje', 'medidasCadastradasHoje', 'cidadesCadastradasHoje'))
        ->with('dadosProChart', json_encode($dadosProChart));
    }

}
