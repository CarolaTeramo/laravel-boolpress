@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Post per tag : {{ $tags->name }}</h1>
    {{-- ho scritto $tags->name perchè è $tags è il nome della variabile definita
    nel PostController  --}}
    <table class="table mt-3">
  <thead>
    <tr>
      <th >Titolo</th>
      <th >Autore</th>
      <th >Creato il</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($posts as $post)
      <tr>
        <td><a href="{{ route('posts.show_public', $post->slug)}}">{{ $post->title}}</a></td>
        <td>{{ $post->author}}</td>
        <td>{{ $post->created_at}}</td>
      </tr>

    @empty
      <p>Non ci sono film</p>
    @endforelse

  </tbody>
</table>
  </div>
@endsection
