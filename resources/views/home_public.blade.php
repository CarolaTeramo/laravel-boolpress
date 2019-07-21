@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h1>Pagina pubblica</h1>
    <table class="table mt-3">
  <thead>
    <tr>
      <th >Id</th>
      <th >Titolo</th>
      <th >Autore</th>
      <th >Slug</th>
      <th >Creato il</th>
      <th >Categoria</th>
      <th >Tag</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($posts as $post)
      <tr>
        <td>{{ $post->id}}</td>
        <td><a href="{{ route('posts.show_public', $post->slug)}}">{{ $post->title}}</a></td>
        <td>{{ $post->author}}</td>
        <td>{{ $post->slug}}</td>
        <td>{{ $post->created_at}}</td>
        <td>
          {{-- qui non posso scrivere {{ $post->category_id}}
          ma dovrò passare alla seconda tabella  oggetto category associato a post
          quindi mi da OGGETTO ->Category--}}
            {{-- se non inserisco if mi da come errrore
            Trying to get property 'name' of non-object perchè non ho inserito numero valori = numero righe --}}

            @if (!empty($post->category))
              <a href="{{ route('posts.posts_of_x_category', $post->category->slug)}}">{{$post->category->name}}</a>
              @else
                (-)
            @endif

          {{-- se voglio fare un controllo inserisco if ternario
          {{ $movie->category ? $post->category->name : 'non presente'}} --}}
        </td>
        <td>
          {{-- per prendere i tag riferiti a un post
          scrivo $post-> perchè è l'elemento ciclato dentro il forelse
          e per richiamare gli elementi della tabella tags associata ->tags
          mi restituisce una collection di array (tags)
          poichè sono array non posso utilizzare empty  ma isNotEmpty perchè guarda dentro array --}}
          @if (($post->tags)->isNotEmpty())

            {{-- ciclo per prendere il nome del tag
            non scrivo $tags as $tag ma devo partire sempre da post --}}
            @foreach ($post->tags as $tag)
              
              <a href="{{ route('posts.posts_of_x_tags', $tag->slug)}}">

                {{$tag->name}}
                {{-- per togliere la virgola alla fine if(non è l'ultimo...)--}}
                @if (!$loop->last)
                  ,
                @endif
              </a>
            @endforeach

          @else
            (-)
          @endif
        </td>
      </tr>

    @empty
      <p>Non ci sono post</p>
    @endforelse

  </tbody>
</table>

  </div>

@endsection
