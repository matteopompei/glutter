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
          <div class="table-responsive">
            <table class="table table-white table-hover">
              <thead class="thead-light">
                <tr>
                  <th class="align-middle text-center" scope="col">e-mail cliente</th>
                  <th class="align-middle text-center" scope="col">Nome cliente</th>
                  <th class="align-middle text-center" scope="col">Numero di telefono</th>
                  <th class="align-middle text-center" scope="col">Indirizzo</th>
                  <th class="align-middle text-center" scope="col">Spese di spedizione</th>
                  <th class="align-middle text-center" scope="col">Totale ordine</th>
                  <th class="align-middle text-center" scope="col">Orario di consegna</th>
                  <th class="align-middle text-center" scope="col">Pagamento ricevuto</th>
                  <th class="align-middle text-center" scope="col">Elimina ordine</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td class="align-middle text-center">{{ $order->email }}</td>
                  <td class="align-middle text-center">{{ $order->name }}</td>
                  <td class="align-middle text-center">{{ $order->phone }}</td>
                  <td class="align-middle text-center">{{ $order->address }}</td>
                  <td class="align-middle text-center">{{ $order->shipment }}€</td>
                  <td class="align-middle text-center">{{ $order->total }}€</td>
                  <td class="align-middle text-center">{{ $order->delivery_date }}</td>
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
                    <button type="submit" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalModal{{ $order->id }}">Elimina</button>
                  </td>
                </tr>
              </tbody>

            </table>

            <div>
              <h3 class="mt-5 mb-3">Prodotti ordinati</h3>
              <table class="table table-white table-hover">
                <thead class="thead-light">

                  <tr>
                    <th class="align-middle text-center" scope="col">Piatto ordinato</th>
                    <th class="align-middle text-center" scope="col">Prezzo singolo piatto</th>
                    <th class="align-middle text-center" scope="col">Quantità piatto ordinata</th>
                    <th class="align-middle text-center" scope="col">Totale singolo piatto</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($order->dishes as $dish)
                    <tr>
                      <td class="align-middle text-center">{{ $dish->name }}</td>
                      <td class="align-middle text-center">{{ $dish->price }}€</td>
                      <td class="align-middle text-center">{{ $dish->pivot->quantity }}</td>
                      <td class="align-middle text-center">{{ $dish->price * $dish->pivot->quantity }}€</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="text-center mt-5 mb-1">
            <a href="/auth/order" class="btn btn-secondary">Indietro</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('auth.order.modal.delete_order')
@endsection
