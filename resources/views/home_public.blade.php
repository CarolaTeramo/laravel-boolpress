@extends('layouts.app')

@section('content')
  <ul>
    @forelse ($posts as $post)
      {{-- il nome della route per la show è in web.php
      qui oltre la route non passo l'id ma lo slug --}}
      <li><a href="{{ route('posts.show',$post->slug) }}">{{ $post->title }}</a> scritto da {{ $post->author }} del {{ $post->created_at }}</li>
    @empty
      <p>Non sono presenti post</p>
    @endforelse
  </ul>

@endsection
