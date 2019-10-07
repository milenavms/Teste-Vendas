<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
   const CREATED_AT = 'data_criacao';
   const UPDATED_AT = 'data_alteracao';

    protected $table = 'produtos';

    public $timestamps = true;

    protected $fillable = ['nome', 'preco' , 'data_criacao' , 'data_alteracao' ];   // é permitido ser inserido, senha n pederia





}