<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Item;
use App\Unidade;
use App\ProdutoDetalhe;
use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:15',
            'descricao' => 'required|min:3|max:30',
            'peso' => 'integer|numeric|max:3',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'nome.max' => 'Maximo 15 caracteres',
            'nome.min' => 'Minimo 3 caracteres',
            'descricacao.max' => 'Maximo 30 caracteres',
            'descricacao.min' => 'Maximo 3 caracteres',
            'peso.integer' => 'É aceitado apenas valores numericos.',
            'peso.max' => 'Maximo 3 caracteres',
            'unidade_id.exists' => 'A unidade de medida informada não existe.',
            //Mensagens genericas !
            'unique' => 'Este :attribute já esta em uso.',
            'email' => 'Este :attribute não é valido.',
            'required' => 'O campo :attribute deve ser preenchido.'
        ];

        $request->validate($regras, $feedback);
        item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {

        $regras = [
            'nome' => 'required|min:3|max:15',
            'descricao' => 'required|min:3|max:30',
            'peso' => 'integer|numeric|max:3',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id',

        ];

        $feedback = [
            'nome.max' => 'Maximo 15 caracteres',
            'nome.min' => 'Minimo 3 caracteres',
            'descricacao.max' => 'Maximo 30 caracteres',
            'descricacao.min' => 'Maximo 3 caracteres',
            'peso.integer' => 'É aceitado apenas valores numericos.',
            'peso.max' => 'Maximo 3 caracteres',
            'unidade_id.exists' => 'A unidade de medida informada não existe.',
            'fornecedor_id.exists' => 'O Fornecedor informado não existe.',

            //Mensagens genericas !
            'unique' => 'Este :attribute já esta em uso.',
            'email' => 'Este :attribute não é valido.',
            'required' => 'O campo :attribute deve ser preenchido.'
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index', ['produto' => $produto->id]);
    }
}
