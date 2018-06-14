<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'valor_compra', 'valor_revenda', 'ativo', 'imagem_url'
    ];
}
