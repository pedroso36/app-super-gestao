<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];
}
