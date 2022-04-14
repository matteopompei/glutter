@extends('layouts.app')

@section('content')
<div class="container text-center my-5">
    <h1>{{$dish->name}}</h1>
    <p>{{$dish->ingredients}}</p>
    <div>
        @if ($dish->image)
            <img src="{{asset("storage/{$dish->image}")}}" alt="{{$dish->name}}">
        @endif
    </div>

    {{-- <div>
        <h3>Categorie</h3>
        @foreach ($dish->categories as $category)
            <h6>{{$category["name"]}}</h6>
        @endforeach
    </div> --}}
    <a href="{{route("auth.dish.index")}}"><button type="button" class="btn btn-secondary my-5">Torna alla home</button></a>
</div>


@endsection