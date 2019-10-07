<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome')->unique();
            $table->string('preco');
            $table->string('data_criacao');
            $table->string('data_alteracao');
           // $table->timestamp(); // aqui pega a data e hora e salva na coluna CREATED_AT, a data de criação, e na coluna UPDATED_AT,  data de modificação
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produtos');
    }
}
