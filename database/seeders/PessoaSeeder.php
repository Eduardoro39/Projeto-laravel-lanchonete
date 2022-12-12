<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pessoa::create([
            'nome' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 123456,
            'funcionario' => 1
        ]);
    }
}
