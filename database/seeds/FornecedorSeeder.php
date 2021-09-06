<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Instanciando um Objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Atlas';
        $fornecedor->site = 'AtlasMaicom.com.br';
        $fornecedor->uf = 'RS';
        $fornecedor->email = 'maicom@hotmail.com';
        $fornecedor->save();
        // Usando metodo Creat, ATENÇão AO METODO FILLABLE NA CLASSE FORNECEDOR
        Fornecedor::create([
            'nome' => 'Fornecedor200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'fornecedor200@gmail.com'
        ]);
        //Insert Usando metodo estatico table
        DB::table('Fornecedores')->insert([
            'nome' => 'Fornecedor300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'RS',
            'email' => 'fornecedor300@gmail.com'
        ]);
    }
}
