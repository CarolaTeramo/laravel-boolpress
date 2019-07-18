<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

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
      $categories = Category::all();
      $data =[
        'categories'=> $categories
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
      //dd($dati);
      //creo nuovo oggetto
      $nuovo_post = new Post();
      //oppure
      //$nuovo_prodotto->name = $dati['name'];
      //etc.. con tutti
      //compila l'ggeto con questi dati
      $nuovo_post->fill($dati);
      $nuovo_post->save();

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
      $data =[
        'post'=> $post,
        'categories'=> $categories
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
