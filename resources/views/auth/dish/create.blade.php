@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center my-5">Crea il tuo piatto</h3>

    <form action="{{route('auth.dish.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="name">Nome piatto</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nome piatto" id="name" name="name">

        </div>            

       

        <div class="form-group">
            <label for="ingredients">Descrizione piatto</label>
            <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" rows="30" placeholder="Descrizione piatto"></textarea>


        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input @error('image') is-invalid @enderror type="file" class="form-control-file" name="image">
        </div>



        <div class="text-center">
            <button type="submit" class="btn btn-secondary my-5 text-center">Salva</button>
        </div>

        <div class="text-center">
            <a href="{{route("auth.dish.index")}}"><button type="button" class="btn btn-secondary">Torna alla home</button></a>
        </div>
    </form>
</div>

@endsection