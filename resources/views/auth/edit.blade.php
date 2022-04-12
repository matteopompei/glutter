@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifica profilo') }}</div>

                    {{-- Form di registrazione --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user) }}">
                            @csrf
                            @method('PATCH')

                            {{-- Campo business_name --}}
                            <div class="form-group row">
                                <label for="business_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome attività') }}</label>

                                <div class="col-md-6">
                                    <input id="business_name" type="text"
                                        class="form-control @error('business_name') is-invalid @enderror"
                                        name="business_name" value="{{ $user->business_name }}" required>

                                    @error('business_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo Via --}}
                            <div class="form-group row">
                                <label for="street"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Via') }}</label>

                                <div class="col-md-6">
                                    <input id="street" type="text"
                                        class="form-control @error('street') is-invalid @enderror" name="street"
                                        value="{{ $address['street'] }}" required>

                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo numero civico --}}
                            <div class="form-group row">
                                <label for="civic"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numero Civico') }}</label>

                                <div class="col-md-6">
                                    <input id="civic" type="text" class="form-control @error('civic') is-invalid @enderror"
                                        name="civic" value="{{ $address['civic'] }}" required>

                                    @error('civic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo città --}}
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                        name="city" value="{{ $address['city'] }}" required>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo provincia --}}
                            <div class="form-group row">
                                <label for="state"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

                                <div class="col-md-6">
                                    <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                                        name="state" value="{{ $address['state'] }}" required>

                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo CAP --}}
                            <div class="form-group row">
                                <label for="cap" class="col-md-4 col-form-label text-md-right">{{ __('CAP') }}</label>

                                <div class="col-md-6">
                                    <input id="cap" type="number" class="form-control @error('cap') is-invalid @enderror"
                                        name="cap" value="{{ $address['cap'] }}" required>

                                    @error('cap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo p_iva --}}
                            <div class="form-group row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="number"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ $user->p_iva }}" required>

                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo email --}}
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Campo password --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Salva') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection