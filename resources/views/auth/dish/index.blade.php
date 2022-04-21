@extends('layouts.app')

@section('title')
    Menù {{ $user->business_name }}
@endsection

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h1><i class="fa-solid fa-angle-right"></i> Menù</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col left">
                    <div class="table-responsive">
                        <table class="table table-white table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th class="align-middle text-center" scope="col">Nome piatto</th>
                                    <th class="align-middle text-center" scope="col">Antemprima piatto</th>
                                    <th class="align-middle text-center" scope="col">Piatto visibile in pagina</th>
                                    <th class="align-middle text-center" scope="col">Modifica il piatto</th>
                                    <th class="align-middle text-center" scope="col">Visualizza il piatto</th>
                                    <th class="align-middle text-center" scope="col">Elimina il piatto</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($dishes as $dish)
                                    <tr>
                                        <td class="align-middle text-center">{{ $dish['name'] }}</td>
                                        <td class="align-middle text-center thumbnail-food">
                                            @if ($dish->image)
                                                <div class="avatar-container">
                                                    <img src="{{ asset("storage/{$dish->image}") }}"
                                                        alt="{{ $dish->name }}" class="img-thumbnail">
                                                </div>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                          @if ($dish->visible == 0)
                                            <div>
                                                <span><i class="fa-solid fa-eye-slash"></i> No</span>
                                            </div>
                                          @else
                                            <div>
                                                <span><i class="fa-solid fa-eye"></i> Sì</span>
                                            </div>
                                          @endif
                                        </td>
                                        <td class="align-middle text-center"><a
                                                href="{{ route('auth.dish.edit', $dish->id) }}"
                                                class="btn btn-success">Modifica</a></td>
                                        <td class="align-middle text-center"><a
                                                href="{{ route('auth.dish.show', $dish->id) }}"
                                                class="btn btn-info text-white">Visualizza</a>
                                        </td>
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
                    </div>

                    <div class="text-center mt-5 mb-1">
                        <a href="{{ route('auth.dish.create') }}" class="btn btn-primary mr-2">Aggiungi piatto
                            al menù</a>
                        <a href="/dashboard" class="btn btn-danger">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
