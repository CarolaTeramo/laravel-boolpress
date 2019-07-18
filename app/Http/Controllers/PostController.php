<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//use aggiunta dopo perchè ho nella funzione post_of_x_category
//$category =Category::
use App\Category;

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
    return view('posts.show_public', compact('post'));
  }

  public function posts_of_x_category($slug)
  {
    //creo due variabili una category e l'altra posts
    $category =Category::where('slug', $slug)->first();
    if (empty($category)) {
      abort(404);
    }
    $posts = $category->posts;
    $data = [
      'posts'=> $posts,
      'category'=> $category
    ];
    return view('posts.posts_of_x_category', $data);

  }
}
