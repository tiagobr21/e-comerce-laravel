<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ItensPedidos extends Model
{

    protected $table = 'itens_pedidos';

    protected $fillable = ['valor','dt_item','produto_id','pedido_id'];

}
