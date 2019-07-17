<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
  public function show($slug)
  {
    //qui per la show per recuperare il dato cliccato
    //non posso utilizzare find perchè find funziona con l'id
    $post = Post::where('slug', $slug)->first();
    if (empty($post)) {
    abort(404);
    }
    //i file show create come fatto prima li metto
    // dentro una cartella con nome = nome tabella
    //quindi avro view ('posts.show', dato da passare)
    return view('posts.show', compact('post'));
  }
}
