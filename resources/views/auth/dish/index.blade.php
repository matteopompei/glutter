@extends('layouts.app')

@section('content')
    <div>
        <table class="table table-bordered table-white">
            <thead>
              <tr>
                <th class="align-middle text-center" scope="col">ID</th>
                <th class="align-middle text-center" scope="col">Nome piatto</th>
                <th class="align-middle text-center" scope="col">Modifica il piatto</th>
                <th class="align-middle text-center" scope="col">Visualizza il piatto</th>
                <th class="align-middle text-center" scope="col">Elimina il piatto</th>
              </tr>
            </thead>
        
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <th class="align-middle text-center" scope="row">{{$dish["id"]}}</th>
                        <td class="align-middle text-center">{{$dish["name"]}}</td>
                        <td class="align-middle text-center"><a href="{{route("auth.dish.edit", $dish->id)}}"><button type="button" class="btn btn-secondary">Modifica</button></a></td>
                        <td class="align-middle text-center"><a href="{{route("auth.dish.show", $dish->id)}}"><button type="button" class="btn btn-secondary">Visualizza</button></a></td>
                        <td class="align-middle text-center">
                            <form action="{{route("auth.dish.destroy", $dish->id)}}" method="post">

                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-secondary" onclick="return confirm('Sei sicuro? Il prodotto verrà eliminato definitivamente')">Delete</button>
            
                            </form>
                        </td>

                     </tr>
                @endforeach
            </tbody>
          </table>
        
          <div class="text-center my-5">
            <a href="{{route("auth.dish.create")}}"><button type="button" class="btn btn-secondary">Aggiungi piatto al menù</button></a>
          </div>
    </div>
@endsection