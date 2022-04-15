@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h3><i class="fa-solid fa-angle-right"></i> Modifica piatto</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col left">
                    <form action="{{ route('auth.dish.update', $dish->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Nome piatto</label>
                            <input class="form-control" type="text" placeholder="Nome del piatto" id="name" name="name"
                                value="{{ $dish->name }}">
                        </div>

                        <div class="form-group">
                            <label for="content">Ingredienti</label>
                            <textarea class="form-control" id="ingredients" name="ingredients" rows="30"
                                placeholder="Descrizione del piatto">{{ $dish->ingredients }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="ingredients">Prezzo</label>
                            <input type="number" step="0.01" min="0.01"
                                class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                value="{{ $dish->price }}" rows="1" placeholder="Prezzo">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visible" id="visible" value="1">
                            <label class="visible" for="visible">
                              Visibile in pagina
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="visible" id="visible" value="0" checked>
                            <label class="visible" for="visible">
                              Non visibile in pagina
                            </label>
                          </div>

                        <div class="text-center mt-5 mb-1">
                            <button type="submit" class="btn btn btn btn-primary mr-2">Salva le modifiche</button>
                            <a href="{{ route('auth.dish.index') }}" class="btn btn-danger">Indietro</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
