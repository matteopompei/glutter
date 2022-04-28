@extends('layouts.app')

@section('title')
  Modifica {{ $dish->name }}
@endsection

@section('content')
  <div class="container">
    <div class="dashboard">
      <div class="row">
        <div class="col">
          <div class="title mb-5">
            <h1><i class="fa-solid fa-angle-right"></i> Modifica piatto</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col left">
          <form action="{{ route('auth.dish.update', $dish['id']) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="title">Nome piatto</label>
              <input class="form-control" type="text" placeholder="Nome del piatto" id="name" name="name"
                value="{{ $dish->name }}" required>

              @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="content">Ingredienti</label>
              <textarea class="form-control" id="ingredients" name="ingredients" rows="5" placeholder="Descrizione del piatto"
                required>{{ $dish->ingredients }}</textarea>

              @error('ingredients')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="ingredients">Prezzo</label>
              <input type="number" step="0.01" min="0.01" max="5000"
                class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ $dish->price }}" rows="1" placeholder="Prezzo" required>

              @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

                        <div class="form-group">
                            @if ($dish->image)
                                <div class="col-md-4 text-center">
                                    <div class="mb-4 avatar-container">
                                        <img src="{{ asset("storage/{$dish->image}") }}" alt="{{ $dish->name }}"
                                            class="img-food">
                                    </div>
                                </div> 
                            @else
                            <div class="col-md-4 text-center">
                                <div class="mb-4 avatar-container">
                                    <img src="{{ asset("storage/uploads/dish-placeholder.png") }}" alt="dish-placeholder" class="img-food">
                                </div>
                            </div> 
                            @endif
                        </div>

            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control-file" name="image" id="image">

              @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="visible" value="1"
                {{ $dish->visible == 1 ? ' checked' : '' }}>
              <label for="visible">
                Visibile in pagina
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="visible" id="not-visible" value="0"
                {{ $dish->visible == 0 ? ' checked' : '' }}>
              <label for="not-visible">
                Non visibile in pagina
              </label>
            </div>

            <div class="text-center mt-5 mb-1">
              <button type="submit" class="btn btn btn btn-primary mr-2">Salva le modifiche</button>
              <a href="{{ route('auth.dish.index') }}" class="btn btn-secondary">Indietro</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
