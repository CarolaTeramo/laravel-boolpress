@extends('layouts.app')

@section('page_title', 'crea')


@section('content')
  <div class="container mt-5">

    <h1>Inserisci un nuovo post</h1>

    <form method="post" action="{{ route('admin.posts.store') }}">
      {{-- per passare i dati devo inserire token che si aggiunge al form si mette anche nelle chiamate ajax--}}
      @csrf
    <div class="form-group">
      <label for="title">Titolo post</label>
      <input type="text" class="form-control" name="title" placeholder="Inserisci il titolo" value="{{ old('title', $post->title) }}">
      {{-- per avere l'errore sotto l'input --}}
      @error ('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Testo</label>
      <textarea name="content" class="form-control" placeholder="Inserisci il testo" rows="8" cols="80">{{ old('content', $post->content) }}</textarea>
      @error ('content')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" class="form-control" name="author" placeholder="Inserisci l'autore" value="{{ old('author', $post->author) }}">
      @error ('author')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="category_id">Categoria</label>
      <select class="form-control" name="category_id">
        <option value="">Seleziona la categoria</option>
        {{-- faccio un ciclo per inserire le categorie nella select --}}
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach

      </select>
      @error ('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

@endsection
