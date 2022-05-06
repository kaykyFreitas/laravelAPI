<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Usuario::create($request->all())) {
            return response()->json([
                'message' => 'Usuario cadastrado com seucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o usuario.'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($usuario)
    {
        $usuario_selecionado = Usuario::find($usuario);
        if($usuario_selecionado) {
            return $usuario_selecionado;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar usuario.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usuario)
    {
        $usuario_selecionado = Usuario::find($usuario);
        if($usuario_selecionado) {
            $usuario_selecionado->update($request->all());
            return $usuario_selecionado;
        }

        return response()->json([
            'message' => 'Erro ao atualizar usuario.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario)
    {
        if(Usuario::destroy($usuario)) {
            return response()->json([
                'message' => 'Usuario deletado com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar usuario.'
        ], 404);
    }
}
