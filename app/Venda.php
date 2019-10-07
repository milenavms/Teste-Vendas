<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    protected $table = 'vendas';

    public $timestamps = true;

    protected $fillable = ['usuario_id', 'produto_id','data_criacao' , 'data_alteracao' ];   // é permitido ser inserido, senha n pederia  




    //relacionamento
  
    public function produtos()
    {
        return $this->hasOne( 'App\Produto', 'produto_id');
    }

   

    // Uma venda é realiza por 1 usuário Venda->usuarios
    public function usuarios()
    {
        //return $this->hasOne( 'App\Usuario', 'usuario_id');
        $this->belongsTo('App\Usuario', 'usuario_id', 'id');
    }


}
