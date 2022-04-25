<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Braintree</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/backoffice.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div>Carrello: </div>
                <div id="cart"></div>
                <div>Totale:</div>
                <div id="total"></div>
            </div>
        </div>

        <div class="row">
            <form action="{{ route('payment.shippingvalidation') }}">
                @csrf
                {{-- Campo Nome e Cognome --}}
                <div class="form-group row">
                    <label for="fullName" class="col-md-4 col-form-label text-md-right">Nome e cognome</label>

                    <div class="col-md-6">
                        <input id="fullName" type="text" class="form-control @error('fullName') is-invalid @enderror"
                            name="fullName"
                            value="@if (isset($form_data)) {{ $form_data['fullName'] }} @else {{ old('fullName') }} @endif"
                            minlength="3" required>

                        @error('fullName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Campo Via --}}
                {{-- <div class="form-group row">
                        <label for="street" class="col-md-4 col-form-label text-md-right">Via</label>
    
                        <div class="col-md-6">
                            <input id="street" type="text" class="form-control @error('street') is-invalid @enderror"
                                name="street" value="{{ old('street') }}" required>
    
                            @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                {{-- Campo numero civico --}}
                {{-- <div class="form-group row">
                        <label for="civic" class="col-md-4 col-form-label text-md-right">Numero Civico</label>
    
                        <div class="col-md-6">
                            <input id="civic" type="text" class="form-control @error('civic') is-invalid @enderror"
                                name="civic" value="{{ old('civic') }}" required>
    
                            @error('civic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                {{-- Campo città --}}
                {{-- <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-right">Città</label>
    
                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                name="city" value="{{ old('city') }}" required>
    
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                {{-- Campo provincia --}}
                {{-- <div class="form-group row">
                        <label for="state" class="col-md-4 col-form-label text-md-right">Provincia</label>
    
                        <div class="col-md-6">
                            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                                name="state" value="{{ old('state') }}" required>
    
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                {{-- Campo CAP --}}
                {{-- <div class="form-group row">
                        <label for="cap" class="col-md-4 col-form-label text-md-right">CAP</label>
    
                        <div class="col-md-6">
                            <input id="cap" type="text" class="form-control @error('cap') is-invalid @enderror" name="cap"
                                value="{{ old('cap') }}" minlength="5" maxlength="5" required>
    
                            @error('cap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                {{-- Campo numero di telefono --}}
                {{-- <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Numero di telefono</label>
    
                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" required>
    
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                {{-- Campo email --}}
                {{-- <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
    
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                {{-- <div>Data di consegna</div>
                    <div>Orario</div> --}}

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Conferma dati
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if (isset($form_data))
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container"></div>
                <button id="pay-button">Paga</button>
            </div>
        @endif
    </div>
    <script>
        const cart = JSON.parse(window.localStorage.getItem('cart'));
        let total = 0;

        for (let item of cart) {
            document.getElementById("cart").innerHTML += item.name + " x" + item.quantity + " tot: " + item.totalPrice +
                "<br>";
            total += parseFloat(item.totalPrice);
            console.log(item);
        }

        document.querySelector('#total').innerHTML = total;


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

        const payButton = document.querySelector('#pay-button');
        braintree.dropin.create({
            authorization: "{{ Braintree\ClientToken::generate() }}",
            container: '#dropin-container'
        }, function(createErr, instance) {
            payButton.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    payload.cart = cart;
                    $.get('{{ route('payment.process') }}', {
                        payload
                    }, function(response) {
                        console.log(response)
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
</body>

</html>