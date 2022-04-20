@extends('layouts.app')

@section('title', 'Aggiungi Piatto')

@section('content')
  <div class="container">
    <div class="dashboard">
      <div class="row">
        <div class="col">
          <div class="title mb-5">
            <h1><i class="fa-solid fa-angle-right"></i> Aggiungi un piatto</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col left">

          <form action="{{ route('auth.dish.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
              <label for="name">Nome piatto</label>
              <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nome piatto"
                id="name" name="name">

              @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="ingredients">Descrizione piatto</label>
              <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" rows="5"
                placeholder="Descrizione piatto"></textarea>

              @error('ingredients')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="price">Prezzo</label>
              <input type="number" step="0.01" min="0.01" class="form-control @error('price') is-invalid @enderror"
                id="price" name="price" rows="1" placeholder="Prezzo">

              @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Image</label>
              <input @error('image') is-invalid @enderror type="file" class="form-control-file" name="image">

              @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="visible" value="1">
              <label for="visible">
                Visibile in pagina
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="not-visible" value="0" checked>
              <label for="not-visible">
                Non visibile in pagina
              </label>
            </div>

            <div class="text-center mt-5 mb-1">
              <button type="submit" class="btn btn btn-primary mr-2">Aggiungi</button>
              <a href="{{ route('auth.dish.index') }}" class="btn btn-danger">Indietro</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
