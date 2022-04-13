@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center my-5">Crea il tuo piatto</h3>

    <form  method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="title">Nome piatto</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Nome piatto" id="title" name="title">

        </div>            

       

        <div class="form-group">
            <label for="content">Descrizione piatto</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" placeholder="Desscrizione piatto"></textarea>


        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-secondary my-5 text-center">Salva</button>
        </div>

        <div class="text-center">
            <a ><button type="button" class="btn btn-secondary">Torna alla home</button></a>
        </div>
    </form>
</div>

@endsection