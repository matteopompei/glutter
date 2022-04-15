@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="dashboard">
      <div class="row">
        <div class="col">
          <div class="title mb-5">
            <h3><i class="fa-solid fa-angle-right"></i> Menù</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col left">
          <table class="table table-white table-hover">
            <thead class="thead-light">
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
                  <th class="align-middle text-center" scope="row">{{ $dish['id'] }}</th>
                  <td class="align-middle text-center">{{ $dish['name'] }}</td>
                  <td class="align-middle text-center"><a href="{{ route('auth.dish.edit', $dish->id) }}"><button
                        type="button" class="btn btn-success">Modifica</button></a></td>
                  <td class="align-middle text-center"><a href="{{ route('auth.dish.show', $dish->id) }}"><button
                        type="button" class="btn btn-info">Visualizza</button></a></td>
                  <td class="align-middle text-center">
                    <form action="{{ route('auth.dish.destroy', $dish->id) }}" method="post">

                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Sei sicuro? Il prodotto verrà eliminato definitivamente.')">Delete</button>

                    </form>
                  </td>

                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="text-center mt-5 mb-1">
            <a href="{{ route('auth.dish.create') }}"><button type="button" class="btn btn-primary mr-2">Aggiungi piatto
                al
                menù</button></a>
            <a href="/dashboard" class="btn btn-danger">Indietro</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
