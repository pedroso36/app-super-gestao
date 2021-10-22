<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(5);


        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {

        // dd($request);
        //INCLUSÃO
        if ($request->input('_token') != '' && $request->input('id') == '') {

            $msg = '';
            $regras = [
                'nome' => 'required|max:50|min:3',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'nome.min' => 'É necessario ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no maximo 50 caracteres.',
                'uf.min' => 'É permitido no minimo 2 caracteres',
                'uf.max' => 'É permitido no maximo 2 caracteres',
                'email.email' => 'O campo :attribute não foi preenchido corretamente',

                //Metodo generico para verificação
                'unique' => 'Este :attribute já esta em uso.',
                'email' => 'Este :attribute não é valido.',
                'required' => 'O campo :attribute deve ser preenchido.'
            ];

            $request->validate($regras, $feedback);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }
        //EDIÇÃO
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Atualização realizada Com Sucesso';
            } else {
                $msg =  'Atualização apresentou problema !';
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }
        return view('app.fornecedor.adicionar');
    }

    public function editar($id, $msg = null)
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
    }
}
