@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title">
                        <h3><i class="fa-solid fa-angle-right"></i> Dashboard</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5 info">
                    <div class="text-center title">
                        <h4>Riepilogo informazioni</h4>
                    </div>
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Avatar" class="img-fluid avatar">
                    <ul>
                        <li><strong>Nome attività: </strong> {{ Auth::user()->business_name }}</li>
                        <li><strong>Indirizzo: </strong> {{ Auth::user()->address }}</li>
                        <li><strong>Email: </strong> {{ Auth::user()->email }}</li>
                        <li><strong>Partita IVA: </strong> {{ Auth::user()->p_iva }}</li>
                        <li><strong>Categorie: </strong>
                            @foreach (Auth::user()->categories as $category)
                                <span class="category">{{ $category->name }} </span>
                            @endforeach
                        </li>
                    </ul>
                    <a href="{{ route('auth.edit', [Auth::user()->id]) }}" class="btn btn-primary edit">Modifica
                        informazioni</a>
                </div>
                <div class="col-7 welcome">
                    <h2>Bentornato!</h2>
                    <h5>Da qui puoi amministrare la pagina della tua attività.</h5>
                    <div class="row text-center">
                        <div class="col-lg">
                            <a href="/"><i class="fa-solid fa-house"></i>
                                Home</a>
                        </div>
                        <div class="col-lg">
                            <a href="#"><i class="fa-solid fa-eye"></i>
                                Anteprima attività</a>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg">
                            <a href="{{ route('auth.dish.index') }}"><i class="fa-solid fa-utensils"></i>
                                Visualizza menù</a>
                        </div>
                        <div class="col-lg">
                            <a href="#"><i class="fa-solid fa-list-check"></i>
                                Visualizza ordini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
