<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //questa è pagina index dei post nell'area riservata
      $posts = Post::all();
      $data = [
        'posts'=> $posts
      ];
      return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //qui non posso fare solo return view('admin.posts.create'); ma
      //nel file create.blade devo ciclare sulla colonna category_id
      //che è presente nella tabella categories quindi
      // creo nuovo model Category e mi ricordo di inserire
      //use App\Category;
      //lo stesso per Tag
      $categories = Category::all();
      $tags = Tag::all();
      $data =[
        'categories'=> $categories,
        'tags'=> $tags
      ];
      return view('admin.posts.create', $data);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'content' => 'required',
        'content' => 'required',
      ]);

      //prendo dati dal form
      $dati = $request->all();
      //ora creo lo slug a partire dal titolo
      //recupero la chiave title dallo slug
      $dati['slug'] = Str::slug($dati['title']);

      //recupero anche la categoria selezionata dalla select
      $category = Category::find($dati['category_id']);
      //verifico se l'id della categoria ricevuto dal post
      //corrisponda a una categoria realmente esistente
      //controllo
      if (empty($category)) {
        //  se non esiste una categoria con l'id selezionato
        // =>tolgo il category_id dai dati 'fillable'
        //non settare...
        unset($dati['category_id']);
      }
      //dd($dati);
      //creo nuovo oggetto
      $nuovo_post = new Post();
      //oppure
      //$nuovo_prodotto->name = $dati['name'];
      //etc.. con tutti
      //compila l'ggeto con questi dati
      $nuovo_post->fill($dati);
      $nuovo_post->save();
      //
      $nuovo_post->tags()->sync($dati['tag']);
      //questo tag tra parentesi quadre è quello inserito nel
      //name dell'input della checkbox

      //se inserisco il file store.blade.php allora
      //retur view('store');
      //ma è meglio non inserirlo
      return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) //non metto id ma slug
    {
      //utlizzo where e non find perche find va con id
      $post =Post::where('slug', $slug)->first();
      if (empty($post)) {
        abort(404);
      }
      return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      //uguale a Show
      //recupero id qui lo slug
      $post =Post::where('slug', $slug)->first();
      if (empty($post)) {
        abort(404);
      }
      $categories = Category::all();
      $tags = Tag::all();
      $data =[
        'post'=> $post,
        'categories'=> $categories,
        'tags'=> $tags
      ];

      return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
      //recupero lo slug
      $post = Post::where('slug', $slug)->first();
      $post->delete();

      return redirect()->route('admin.posts.index');
    }
}
