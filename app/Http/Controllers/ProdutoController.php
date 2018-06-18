<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Resources\ProdutoResource;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = ProdutoResource::collection(Produto::paginate(15));
        return $produtos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $produto = Produto::create($data);
        }catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
                ], 500);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $product)
    {
        $produto = new ProdutoResource($product);
        return $produto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($prod, Request $request)
    {
        $data = [
            'nome' => $request->input('nome'), 
            'descricao' => $request->input('descricao'), 
            'valor_compra' => $request->input('valor_compra'), 
            'valor_revenda' => $request->input('valor_revenda'), 
            'ativo' => $request->input('ativo'), 
            'imagem_url' => $request->input('imagem_url')
        ];

        $produto = Produto::find($prod);

        if(! $produto) {
            return response()->json([
                'error' => 'Product not found'
            ], 404);
        }
        
        $produto->update($data);

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($produtoId)
    {
        $produto = Produto::find($produtoId);

        if(! $produto) {
            return response()->json([
                'error' => 'Product not found'
            ], 404);
        }

        $produto->delete();

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
