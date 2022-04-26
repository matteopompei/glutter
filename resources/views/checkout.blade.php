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
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <form action="{{ route('payment.shippingvalidation') }}">
                        @csrf
                        {{-- Campo Nome e Cognome --}}
                        <div class="form-group row">
                            <label for="fullName" class="col-md-4 col-form-label text-md-right">Nome e cognome</label>

                            <div class="col-md-6">
                                <input id="fullName" type="text"
                                    class="form-control @error('fullName') is-invalid @enderror" name="fullName"
                                    value="@if(isset($form_data)){{ $form_data['fullName'] }}@else{{ old('fullName') }}@endif"
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
                                    value="@if(isset($form_data)){{ $form_data['email'] }}@else{{ old('email') }}@endif"
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
                                    value="@if(isset($form_data)){{$form_data['phone']}}@else{{ old('phone') }}@endif"
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
                                    value="@if(isset($form_data)){{$form_data['street']}}@else{{ old('street') }}@endif"
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
                                    value="@if(isset($form_data)){{ $form_data['civic'] }}@else{{ old('civic') }}@endif"
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
                                    value="@if(isset($form_data)){{ $form_data['city'] }}@else{{ old('city') }}@endif"
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
                                    value="@if(isset($form_data)){{ $form_data['state'] }}@else{{ old('state') }}@endif"
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
                                    value="@if(isset($form_data)){{ $form_data['cap'] }}@else{{ old('cap') }}@endif"
                                    minlength="5" maxlength="5" required>

                                @error('cap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="shipping_time">Il tuo ordine verrà consegnato alle:</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Conferma dati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <h1>(nome ristorante)</h1>
                    <div>
                        <span>Carrello: </span>
                        <span id="cart"></span>
                    </div>
                    <div>
                        <span>Totale:</span>
                        <span id="total"></span>
                    </div>
                </div>
            </div>

            @if (isset($form_data))
                <div class="col-md-8 col-md-offset-2">
                    <div id="dropin-container"></div>
                    <button id="pay-button" class="btn" style="background-color: green">Paga</button>
                </div>
            @endif
        </div>
    </main>


    {{-- Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <script>
        const cart = JSON.parse(window.localStorage.getItem('cart'));
        const userID = window.localStorage.getItem('userID');
        let total = 0;

        for (let item of cart) {
            document.getElementById("cart").innerHTML += item.name + " x" + item.quantity + "<br>";
            total += parseFloat(item.totalPrice);
        }

        document.querySelector('#total').innerHTML = total + "€";

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

    @if (isset($form_data))
        <script>
            let form_data = {!! json_encode($form_data) !!}

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
                                alert('Payment successfull!');
                            } else {
                                alert('Payment failed');
                            }
                        }, 'json');
                    });
                });
            });
        </script>
    @endif
</body>

</html>
