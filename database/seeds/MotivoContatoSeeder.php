<?php

use App\MotivoContato;
use Illuminate\Database\Seeder;


class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['motivo_Contato' => 'Dúvida']);
        MotivoContato::create(['motivo_Contato' => 'Elogio']);
        MotivoContato::create(['motivo_Contato' => 'Reclamação']);
    }
};
