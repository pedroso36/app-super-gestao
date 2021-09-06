<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*//
        $contato = new SiteContato();
        $contato->nome = 'SiteAtlas';
        $contato->telefone = '54981109100';
        $contato->email = 'atlas@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Bora pra Cima';
        $contato->save();
        */

        factory(SiteContato::class, 100)->create();
    }
}
