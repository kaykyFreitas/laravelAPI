<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vendedor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Vendedor::create($request->all())) {
            return response()->json([
                'message' => 'Vendedor cadastrado com seucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o vendedor.'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vendedor)
    {
        $vendedor_selecionado = Vendedor::find($vendedor);
        if($vendedor_selecionado) {
            return $vendedor_selecionado;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar vendedor.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vendedor)
    {
        $vendedor_selecionado = Vendedor::find($vendedor);
        if($vendedor_selecionado) {
            $vendedor_selecionado->update($request->all());
            return $vendedor_selecionado;
        }

        return response()->json([
            'message' => 'Erro ao atualizar vendedor.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendedor)
    {
        if(Vendedor::destroy($vendedor)) {
            return response()->json([
                'message' => 'Vendedor deletado com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar vendedor.'
        ], 404);
    }
}
