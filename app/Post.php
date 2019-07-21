<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  //devo dire al model che esiste la chiave estena e il tipo di
  //collegamento qui molti a 1 quindi
  //nome funzione category al SINGOLARE
  public function category(){
    return $this->belongsTo('App\Category');
  }

  protected $fillable = ['category_id', 'title', 'content', 'author', 'slug'];
  //ho inserito i nomi delle colonne del database che voglio utilizzare nei file blade
  //di cui voglio fare fill e ANCHE la chiave esterna category_id

  //devo dire al model che esiste la chiave estena e il tipo di
  //collegamento qui molti a molti con tabella tags quindi
  //nome funzione tags al PLURALE
  public function tags(){
    return $this->belongsToMany('App\Tag');
  }

}
