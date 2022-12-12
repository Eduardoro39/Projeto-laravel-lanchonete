<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create([
            'pessoa_id' => 1,
            'cidade_id' => 1,
            'telefone' => '123456789'
        ]);
    }
}
