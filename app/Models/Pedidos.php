<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Pedidos extends Model
{

    protected $table = 'pedidos';

    protected $fillable = ['datapedido','status','usuario_id'];

}
