<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;


class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();
        //dd($request);
        /* FORMA 1 DE PASSAR OS DADOS PARA O BANCO DE DADOS
        $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save();
        */

        //FORMA 2 DE PASSAR OS DADOS PARA O BANCO DE DADOS, USANDO O ARRAY ASSOCIATIVO, E USANDO O METODO CREATE
        //VAI MAIS FACIL

        //$contato = new SiteContato();
        //$contato->create($request->all());


        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(request $request)
    {
        //Antes de Gravar os dados do formulario, devemos validar os dados recebidos no request

        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|max:11',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            //Mensagem de erros especificas
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no maximo 40 caracteres.',
            'telefone.max' => 'O campo telefone deve ter no maximo 11 caracteres.',
            'mensagem.max' => 'A mensagem deve ter no maximo 2000 caracteres.',

            // Mensagem de erros genericos.
            'unique'   => 'Este :attribute já está em uso',
            'email'    => 'O :attribute informado não é valido. ',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
