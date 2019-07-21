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
      <input type="text" class="form-control" name="title" placeholder="Inserisci il titolo" value="{{ old('title') }}">
      {{-- per avere l'errore sotto l'input --}}
      @error ('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Testo</label>
      <textarea name="content" class="form-control" placeholder="Inserisci il testo" rows="8" cols="80">{{ old('content') }}</textarea>
      @error ('content')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" class="form-control" name="author" placeholder="Inserisci l'autore" value="{{ old('author') }}">
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
    <div class="form-group">
      <label>Tag: </label>
      @foreach ($tags as $tag)
        {{-- metto input dentro label così posso cliccare anche il testo e non solo
        il quadraatino --}}
        {{-- poichè il checkbox può accettare più di un valore
        per passare i dati allo store devo inserire nel name un array tags[]
        nel value avro il valore che andrà nell'array --}}
        <label><input type="checkbox" name="tag[]" value="{{ $tag->id }}">{{ $tag->name }}</label>
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

@endsection
