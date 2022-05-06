<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Produto::create($request->all())) {
            return response()->json([
                'message' => 'Produto cadastrado com seucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o produto.'
        ], 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($produto)
    {
        $produto_selecionado = Produto::find($produto);
        if($produto_selecionado) {
            return $produto_selecionado;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar produto.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produto)
    {
        $produto_selecionado = Produto::find($produto);
        if($produto_selecionado) {
            $produto_selecionado->update($request->all());
            return $produto_selecionado;
        }

        return response()->json([
            'message' => 'Erro ao atualizar produto.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($produto)
    {
        if(Produto::destroy($produto)) {
            return response()->json([
                'message' => 'Produto deletado com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar produto.'
        ], 404);
    }
}
