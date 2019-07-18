@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <h3>{{ $post->author }}</h3>
    <small>{{ $post->created_at }}</small>
  </div>
@endsection
