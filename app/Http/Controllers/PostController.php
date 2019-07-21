<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//use aggiunta dopo perchè ho nella funzione post_of_x_category
//$category =Category::
use App\Category;
use App\Tag;


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

  //per selezionare tutti i post di una data categoria
  public function posts_of_x_category($slug)
  {
    //creo due variabili una category e l'altra posts
    // la variabile $category è = oggetto Category dove
    //nella colonna 'slug' ha valore = $slug
    $category =Category::where('slug', $slug)->first();
    if (empty($category)) {
      abort(404);
    }
    //post associato a quella categoria
    //creo variabile posts = relazione variabile
    //$category e post associati
    $posts = $category->posts;
    $data = [
      'posts'=> $posts,
      'category'=> $category
    ];
    return view('posts.posts_of_x_category', $data);

  }

  //per selezionare tutti i post di una dato tag

  public function posts_of_x_tags($slug)
  {
    //creo due variabili una tags e l'altra posts
    // la variabile $tags è = oggetto Tag dove
    //nella colonna 'slug' ha valore = $slug
    $tags = Tag::where('slug', $slug)->first();
    // if (($tags)->isNotEmpty()) {
    //   abort(404);
    // }
    //post associato a quella categoria
    //creo variabile posts = relazione variabile
    //$tags e post associati
    $posts = $tags->posts;
    $data = [
      'posts'=> $posts,
      'tags'=> $tags
    ];
    return view('posts.posts_of_x_tags', $data);
  }

}
