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
            return reponse()->json([
                'error' => $e->getMessage()
                ], 500);
        }

        return reponse()->json([
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
    public function update(Produto $prod, Request $request)
    {
        $data = $request->all();

        $produto = Produto::find($prod);

        dd($produto);
                

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
