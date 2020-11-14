<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dados = $request->all();
        $pets = new Pets();
        $pets->nome = $dados['nome'];
        $pets->nascimento = $dados['nascimento'];
        $pets->tipo = $dados['tipo'];
        $pets->raca = $dados['raca'];
        $pets->sexo = $dados['sexo'];
        $pets->namoro = $dados['namoro'];
        $pets->usuario_id = $dados['usuario_id'];

        if(!$pets->nome){
            return response(" O campo nome é Obrigatorio.",400);
        }
        if(!$pets->nascimento){
            return response(" O campo nascimento é Obrigatorio.",400);
        }
        if(!$pets->tipo){
            return response(" O campo tipo é Obrigatorio.",400);
        }
        if(!$pets->raca){
            return response(" O campo raça é Obrigatorio.",400);
        }
        if(!$pets->sexo){
            return response(" O campo sexo é Obrigatorio.",400);
        }
        // if(!$pets->namoro){
        //     return response(" O campo namoro é Obrigatorio.",400);
        // }
        if(!$pets->usuario_id){
            return response(" Usuário não encontrado.",400);
        }

        $pets->save();
        return $pets;

    }


    // public usuario_id: number = null;
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pets  $pets
     * @return \Illuminate\Http\Response
     */
    public function show(Pets $pets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pets  $pets
     * @return \Illuminate\Http\Response
     */
    public function edit(Pets $pets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pets  $pets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pets $pets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pets  $pets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pets $pets)
    {
        //
    }
}
