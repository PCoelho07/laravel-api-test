<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'valor_compra' => $this->valor_compra, 
            'valor_revenda' => $this->valor_revenda,
            'ativo' => $this->ativo,
            'imagem_url' => $this->imagem_url
        ];
    }
}
