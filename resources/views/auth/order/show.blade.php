@extends('layouts.app')

@section('title')
    {{ $order->name }}
@endsection

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h1><i class="fa-solid fa-angle-right"></i> {{ $order->name }}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col left">
                    <div>
                        <table class="table table-white table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th class="align-middle text-center" scope="col">ID</th>
                                    <th class="align-middle text-center" scope="col">e-mail cliente</th>
                                    <th class="align-middle text-center" scope="col">Nome cliente</th>
                                    <th class="align-middle text-center" scope="col">Numero di telefono</th>
                                    <th class="align-middle text-center" scope="col">Indirizzo</th>
                                    <th class="align-middle text-center" scope="col">Spese di spedizione</th>
                                    <th class="align-middle text-center" scope="col">Totale ordine</th>
                                    <th class="align-middle text-center" scope="col">Pagato</th>
                                    <th class="align-middle text-center" scope="col">Elimina ordine</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                    <tr>
                                        <td class="align-middle text-center">{{ $order->id }}</td>
                                        <td class="align-middle text-center">{{ $order->email }}</td>
                                        <td class="align-middle text-center">{{ $order->name }}</td>
                                        <td class="align-middle text-center">{{ $order->phone }}</td>
                                        <td class="align-middle text-center">{{ $order->address }}</td>
                                        <td class="align-middle text-center">{{ $order->shipment }}</td>
                                        <td class="align-middle text-center">{{ $order->total }}€</td>
                                        <td class="align-middle text-center">
                                          @if ($order->payed == 0)
                                            <div>
                                                <span>No</span>
                                            </div>
                                          @else
                                            <div>
                                                <span>Si</span>
                                            </div>
                                          @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="{{ route('auth.order.destroy', $order->id) }}" method="post">

                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Sei sicuro? Questo ordine verrà eliminato definitivamente.')">Delete</button>

                                            </form>
                                        </td>

                                    </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="text-center mt-5 mb-1">
                        <a href="/auth/order" class="btn btn-danger">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection