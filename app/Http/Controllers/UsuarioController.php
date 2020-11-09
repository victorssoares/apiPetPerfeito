<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use stdClass;

class UsuarioController extends Controller
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
        $us = $request->all();
        $usuario = new Usuario();
        $usuario->nome =$us['nome'];
        $usuario->sexo = $us['sexo'];
        $usuario->nascimento = $us['nascimento'];
        $usuario->email = $us['email'];
        $usuario->cpf = $us['cpf'];
        $usuario->login = $us['login'];
        $usuario->senha = $us['senha'];

        $usuarioExiste = Usuario::where('login', $us['login'])->first();
        if($usuarioExiste){
            return response('Já existe um usuario registrado com esse login.',400);
        }
        $usuarioExiste = Usuario::where('email', $us['email'])->first();

        if($usuarioExiste){
            return response('Já existe um usuario registrado com esse email.',400);
        }

        $confirmarSenha = $us['confirmarSenha'];
        if ($usuario->senha != $confirmarSenha){
            return response(' A senhas não coincidem, tente novamente.', 400);
        }
        $usuario->senha= Hash::make($usuario->senha);

        $usuario->save();
        return $usuario;




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(int $usuario_id)
    {
        //
        return Usuario::with('pets')->find($usuario_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request){
        $login = $request->input('login');
        $senha = $request->input('senha');

        if(!$login || !$senha ){
            return response('Credenciais Invalidas.',400);
        }
        $usuario = Usuario::where('login', $login)->first();

        // var_dump($usuario);

        if (!$usuario){
            return response('Credenciais Invalidas.',400);
        }

        if(!Hash::check($senha, $usuario->senha)){
            return response('Credenciais Invalidas.',400);
        }

        return $usuario;
    }
}
