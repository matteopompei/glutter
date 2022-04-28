<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/backoffice.css') }}">
</head>

<body id="checkout">
    <header>
        <nav
            class="
          navbar navbar-expand-md navbar-dark
          py-3
          fixed-top
          d-flex
          justify-content-between
        ">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('./images/Glutter1.png') }}" alt="Glutter" class="img-fluid logo">
            </a>
        </nav>
        <div class="nav-space"></div>
    </header>
    <main>
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8">

                    <!-- Modal -->
                    <div class="modal fade" id="errorModal" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-gradient-danger">
                                    <h5 class="modal-title text-light" id="errorModalLabel">Qualcosa è andato storto!
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    Si prega di reinserire le informazioni di pagamento e
                                    riprovare, altrimenti aggiornare la pagina o riavviare l'app.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('payment.shippingvalidation') }}" class="mb-5">
                        @csrf
                        {{-- Campo Nome e Cognome --}}
                        <div class="form-group row">
                            <label for="fullName" class="col-md-4 col-form-label text-md-right">Nome e cognome</label>

                            <div class="col-md-6">
                                <input id="fullName" type="text"
                                    class="form-control @error('fullName') is-invalid @enderror" name="fullName"
                                    value="@if (isset($form_data)) {{ $form_data['fullName'] }}@else{{ old('fullName') }} @endif"
                                    minlength="3" required>

                                @error('fullName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="@if (isset($form_data)) {{ $form_data['email'] }}@else{{ old('email') }} @endif"
                                    required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo numero di telefono --}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Numero di telefono</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone"
                                    value="@if (isset($form_data)) {{ $form_data['phone'] }}@else{{ old('phone') }} @endif"
                                    required>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo Via --}}
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">Via</label>

                            <div class="col-md-6">
                                <input id="street" type="text"
                                    class="form-control @error('street') is-invalid @enderror" name="street"
                                    value="@if (isset($form_data)) {{ $form_data['street'] }}@else{{ old('street') }} @endif"
                                    required>

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo numero civico --}}
                        <div class="form-group row">
                            <label for="civic" class="col-md-4 col-form-label text-md-right">Numero Civico</label>

                            <div class="col-md-6">
                                <input id="civic" type="text" class="form-control @error('civic') is-invalid @enderror"
                                    name="civic"
                                    value="@if (isset($form_data)) {{ $form_data['civic'] }}@else{{ old('civic') }} @endif"
                                    required>

                                @error('civic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo città --}}
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Città</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city"
                                    value="@if (isset($form_data)) {{ $form_data['city'] }}@else{{ old('city') }} @endif"
                                    required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo provincia --}}
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">Provincia</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                                    name="state"
                                    value="@if (isset($form_data)) {{ $form_data['state'] }}@else{{ old('state') }} @endif"
                                    required>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo CAP --}}
                        <div class="form-group row">
                            <label for="cap" class="col-md-4 col-form-label text-md-right">CAP</label>

                            <div class="col-md-6">
                                <input id="cap" type="text" class="form-control @error('cap') is-invalid @enderror"
                                    name="cap"
                                    value="@if (isset($form_data)) {{ $form_data['cap'] }}@else{{ old('cap') }} @endif"
                                    minlength="5" maxlength="5" required>

                                @error('cap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo Orario --}}
                        <div class="form-group row">
                            <label for="delivery_date" class="col-md-4 col-form-label text-md-right">Orario di
                                consegna (12-22):</label>

                            <div class="col-md-6">
                                <input type="time" name="delivery_date" id="delivery_date" class="form-control"
                                    value="@if (isset($form_data)) {{ $form_data['delivery_date'] }}@else{{ old('delivery_date') }} @endif"
                                    min="{{ $minTime }}" max="22:00" required>

                                @error('delivery_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-3">
                                    Avanti
                                </button>
                                <button onclick="history.back()" class="btn btn-danger">
                                    Indietro
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Recap carrello --}}
                <div class="col-md-4 carrello">
                    <h1 class="mb-4">Riassunto ordine</h1>
                    <div class="rounded bg-gradient-light p-4">
                        <h2 id="restaurantName" class="mb-3"></h2>
                        <ul id="cart" class="ml-4 mb-3"></ul>
                        {{-- aggiunto span in cui inserire prezzo di spedizione --}}
                        <div class="font-italic">Spese di spedizione: <span id="shipment"></span>€</div>
                        <h5 class="font-weight-bold my-4">Totale <span id="total"
                                class="rounded bg-info text-light font-weight-normal py-1 px-2"></span></h5>
                        <div id="shipping_time">Il tuo ordine verrà consegnato alle:</div>
                    </div>
                </div>
            </div>

            @if (isset($form_data))
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-10">
                        <div id="dropin-container"></div>
                        <button id="pay-button" class="btn btn-success btn-lg mt-3 px-5">Paga</button>
                    </div>
                </div>
            @endif
        </div>
    </main>


    {{-- Script --}}

    <script src="{{ asset('js/backoffice.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

    <script>
        // Variabili carrello
        const cart = JSON.parse(window.localStorage.getItem('cart'));
        const userID = window.localStorage.getItem('userID');
        let total = 0;
        //aggiungo variabile per le spese di spedizione
        let shipmentPrice = 2.50
        // Variabili elementi HTML
        const pageCart = document.getElementById("cart");
        const pageRestaurant = document.getElementById("restaurantName");
        const shipment = document.getElementById("shipment");
        // Aggiunge nome ristorante alla pagina
        pageRestaurant.innerHTML = String(window.localStorage.getItem('businessName'));
        console.log(cart)
        // Aggiunge articoli acqustati alla pagina
        for (let item of cart) {
            //aggiungo il prezzo del singolo item tra parentesi
            pageCart.innerHTML += "<li>" + item.name + " (" + item.price + "€)" + " <em class=\"ml-1\">x" + item.quantity + "</em></li>";
            
            // ho spostato il calcolo delle spese totali qualche riga sotto per aggiungere le spese di spedizione al totale
            console.log(item.totalPrice)
            //imposto un controllo sulle spese di spedizione
            if(item.totalPrice >= 15){
                shipmentPrice = 0   
            }
            shipment.innerHTML = shipmentPrice;
            total = parseFloat(item.totalPrice) + shipmentPrice;
        }
        
        // Aggiunge totale alla pagina
        document.querySelector('#total').innerHTML = total + " €";

        // Versione per chiamata ajax
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $("#submit").click(function(e) {

        //     e.preventDefault();

        //     var input_fullName = $("input[name=fullName]").val();

        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('payment.shippingvalidation') }}",
        //         data: {
        //             fullName: input_fullName,
        //         },
        //         success: function(data) {
        //            console.log(data);
        //         }
        //     });

        // });
    </script>

    {{-- Se il form è stato compilato esegue il codice --}}
    @if (isset($form_data))
        <script>
            // Recupera le informazioni validate del form dal back
            let form_data = {!! json_encode($form_data) !!}

            // Braintree
            const payButton = document.querySelector('#pay-button');
            braintree.dropin.create({
                authorization: "{{ Braintree\ClientToken::generate() }}",
                container: '#dropin-container'
            }, function(createErr, instance) {
                payButton.addEventListener('click', function() {
                    instance.requestPaymentMethod(function(err, payload) {
                        payload.cart = cart;
                        payload.form_data = form_data;
                        payload.user_id = userID;
                        $.get('{{ route('payment.process') }}', {
                            payload
                        }, function(response) {
                            if (response.success) {
                                localStorage.removeItem('cart');
                                localStorage.removeItem('cartCount');
                                localStorage.removeItem('businessName');
                                localStorage.removeItem('userID');

                                window.location.replace("/payment/checkout/success");
                            } else {
                                $("#errorModal").modal();
                            }
                        }, 'json');
                    });
                });
            });
        </script>
    @endif
</body>

</html>
