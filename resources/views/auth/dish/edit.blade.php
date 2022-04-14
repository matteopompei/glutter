@extends('layouts.app')

@section('content')
<form action="{{route('auth.dish.update', $dish->id)}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Nome piatto</label>
        <input class="form-control" type="text" placeholder="Nome del piatto" id="name" name="name" value="{{$dish->name}}">
    </div>

    <div class="form-group">
        <label for="content">Ingredienti</label>
        <textarea class="form-control" id="ingredients" name="ingredients" rows="30" placeholder="Descrizione del piatto">{{$dish->ingredients}}</textarea>
    </div>

    <div class="form-group">
        <label for="ingredients">Prezzo</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            rows="1" placeholder="Prezzo">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" name="image" id="image">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-secondary my-5 text-center">Salva</button>
    </div>

    <div class="text-center">
        <a href="{{route("auth.dish.index")}}"><button type="button" class="btn btn-secondary">Torna alla home</button></a>
    </div>
</form>
@endsection