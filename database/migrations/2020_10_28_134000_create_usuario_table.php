<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome',45);
            $table->string('sexo',1);
            $table->date('nascimento');
            $table->string('email',200);
            $table->string('cpf',14);
            $table->string('login',20);
            $table->string('senha',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }

    public function login(Request $request){

    }
}
