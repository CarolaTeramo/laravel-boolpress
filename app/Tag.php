<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  //devo dire al model che esiste la chiave estena e il tipo di
  //collegamento qui molti a molti con tabella posts quindi
  //nome funzione posts al PLURALE
  public function posts(){
    return $this->belongsToMany('App\Post');
  }
}
