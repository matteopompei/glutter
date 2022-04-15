@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="dashboard">
      <div class="row">
        <div class="col">
          <div class="title mb-5">
            <h3><i class="fa-solid fa-angle-right"></i> {{ $dish->name }}</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col left">
          <div class="row">

            @if ($dish->image)
              <div class="col-md-4 text-center">
                <h3 class="mb-2">Foto piatto</h3>
                <div class="mb-4 avatar-container">
                  <img src="{{ asset("storage/{$dish->image}") }}" alt="{{ $dish->name }}" class="img-food">
                </div>
              </div>
            @endif

            <div class="col-md-8">
              <h3 class="mb-4">Ingredienti</h3>
              <div class="p-3 mb-5 bg-light text-body rounded">{{ $dish->ingredients }}</div>

              <h3 class="mb-2">Prezzo</h3>
              <div class="p-3 mb-5 bg-light text-body rounded">
                <h4>{{ $dish->price }}€</h4>
              </div>
            </div>
          </div>

          <div class="text-center mt-5 mb-1">
            <a href="{{ route('auth.dish.edit', $dish->id) }}" class="btn btn btn-success mr-2">Modifica piatto</a>
            <a href="{{ route('auth.dish.index') }}" class="btn btn-danger">Indietro</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
