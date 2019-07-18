<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  //devo dire al model che esiste la chiave estena e il tipo di
  //collegamento qui 1 a molti
  //quindi NOME FUNZIONE AL PLURALE
  public function posts(){
    return $this->hasMany('App\Post');
  }
}
