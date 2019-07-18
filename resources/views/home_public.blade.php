@extends('layouts.app')

@section('content')
  <h1>Pagina home area pubblica</h1>
  <ul>
    @forelse ($posts as $post)
      {{-- il nome della route per la show è in web.php
      qui oltre la route non passo l'id ma lo slug --}}
      <li><a href="{{ route('posts.show_public',$post->slug) }}">{{ $post->title }}</a> scritto da {{ $post->author }} del {{ $post->created_at }}</li>
      @if (!empty($post->category))
        <li><a href="{{ route('posts.posts_of_x_category', $post->category->slug)}}">{{$post->category->name}}</a></li>
        @else
          (null)
      @endif

    @empty
      <p>Non sono presenti post</p>
    @endforelse
  </ul>

@endsection
