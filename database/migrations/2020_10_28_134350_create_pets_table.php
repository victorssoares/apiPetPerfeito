<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nome',200);
            $table->date('nascimento');
            $table->string('tipo',10);
            $table->string('raca',20);
            $table->string('sexo',5);
            $table->string('namoro',1)->default("N");
            $table->unsignedBigInteger('usuario_id');
            $table ->foreign('usuario_id')->references('id')->on('usuarios')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pets');
    }
}
