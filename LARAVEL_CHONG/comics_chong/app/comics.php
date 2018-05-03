<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comics extends Model
{
//protected $table = 'comics';
protected $table = 'comics';

   protected $fillable  = ['titulo','editorial','descripcion','visible','imagen'];

   protected $PK = 'id';
   public $timestamps = false;

}
