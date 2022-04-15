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
          @if ($dish->image)
            <img src="{{ asset("storage/{$dish->image}") }}" alt="{{ $dish->name }}" class="mb-5 my_center-image-show">
          @endif

          <h4 class="mb-4">Ingredienti</h4>
          <div class="p-3 mb-5 bg-light text-body rounded">{{ $dish->ingredients }}</div>

          <h4 class="mb-2">Prezzo: {{ $dish->price }}€</h4>

          <div class="text-center mb-1">
            <a href="{{ route('auth.dish.edit', $dish->id) }}" class="btn btn btn-success mr-2">Modifica piatto</a>
            <a href="{{ route('auth.dish.index') }}" class="btn btn-danger">Indietro</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
