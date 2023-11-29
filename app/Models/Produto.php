<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
  protected $table = 'produtos';

  protected $fillable = ['nome','valor','foto','descricao','categoria_id'];
}
