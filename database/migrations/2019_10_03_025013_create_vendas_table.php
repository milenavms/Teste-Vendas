<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('data_criacao');
            $table->string('data_alteracao');
           // $table->string('nome_usuario');
            //$table->string('nome_produto');    

           //$table->BigInteger('usuario_id')->unsigned();
           $table->unsignedBigInteger('usuario_id');

           $table->unsignedBigInteger('produto_id');

           $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');

            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
