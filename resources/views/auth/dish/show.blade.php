@extends('layouts.app')

@section('title')
    {{ $dish->name }}
@endsection

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h1><i class="fa-solid fa-angle-right"></i> {{ $dish->name }}</h1>
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

                        <div class="col-md-8">
                            <h3 class="mb-4">Ingredienti</h3>
                            <div class="p-3 mb-5 bg-light text-body rounded">{{ $dish->ingredients }}</div>

                            <h3 class="mb-2">Prezzo</h3>
                            <div class="p-3 mb-5 bg-light text-body rounded">
                                <h4 class="m-0">{{ $dish->price }}€</h4>
                            </div>

                            <h3 class="mb-2">Visibile</h3>
                            @if ($dish->visible == 0)
                                <div class="p-3 mb-5 bg-light text-body rounded">
                                    <h4 class="m-0"><i class="fa-solid fa-eye-slash"></i> No</h4>
                                </div>
                            @else
                                <div class="p-3 mb-5 bg-light text-body rounded">
                                    <h4 class="m-0"><i class="fa-solid fa-eye"></i> Sì</h4>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-center mt-5 mb-1">
                        <a href="{{ route('auth.dish.edit', $dish->id) }}" class="btn btn btn-success mr-2">Modifica
                            piatto</a>
                        <a href="{{ route('auth.dish.index') }}" class="btn btn-danger">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
