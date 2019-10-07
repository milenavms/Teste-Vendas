<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    const CREATED_AT = 'data_criacao';
   const UPDATED_AT = 'data_alteracao';

    protected $table = 'usuarios';

    public $timestamps = true;

    protected $fillable = ['nome', 'senha' , 'email' , 'cep', 'rua', 'data_criacao' ];   // é permitido ser inserido, senha n pederia


    public function vendas() {
        return $this->hasMany('App\Venda');
    }
}
