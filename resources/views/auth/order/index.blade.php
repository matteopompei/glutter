@extends('layouts.app')

@section('title')
    Lista ordini {{ $user->business_name }}
@endsection

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h1><i class="fa-solid fa-angle-right"></i> Lista ordini</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col left">
                    <div class="table-responsive">
                        <table class="table table-white table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th class="align-middle text-center" scope="col">ID ordine</th>
                                    <th class="align-middle text-center" scope="col">Incasso</th>
                                    <th class="align-middle text-center" scope="col">Pagamento ricevuto</th>
                                    <th class="align-middle text-center" scope="col">Visualizza ordine</th>
                                    <th class="align-middle text-center" scope="col">Elimina ordine</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="align-middle text-center">{{ $order['id'] }}</td>
                                        <td class="align-middle text-center">{{ $order['total'] }}€</td>
                                        <td class="align-middle text-center">
                                            @if ($order->payed == 0)
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
                                                href="{{ route('auth.order.show', $order) }}"
                                                class="btn btn-info text-white">Visualizza</a>
                                        </td>
                                        <td class="align-middle text-center">    
                                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#ModalModal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <div class="text-center mt-5 mb-1">
                        <a href="/dashboard" class="btn btn-danger">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('auth.order.modal.delete_order')
@endsection
