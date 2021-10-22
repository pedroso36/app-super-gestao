<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function ProdutoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe');

        // criando essa public function, estamos querendo dizer que ele recupera do model produtoDetalhe,
        // e retorna pra nós a relaçao entre a tabela produto e produto_detalhes, usando a primary key (pk) da tabela
        // produto e a foreing key(fk) da tabela produto_detalhes
    }

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
}
