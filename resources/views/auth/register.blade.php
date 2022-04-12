@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          {{-- Form di registrazione --}}
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              {{-- Campo business_name --}}
              <div class="form-group row">
                <label for="business_name"
                  class="col-md-4 col-form-label text-md-right">{{ __('Nome attività') }}</label>

                <div class="col-md-6">
                  <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror"
                    name="business_name" value="{{ old('business_name') }}" required>

                  @error('business_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- Campo adress --}}
              <div class="form-group row">
                <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                <div class="col-md-6">
                  <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress"
                    value="{{ old('adress') }}" required>

                  @error('adress')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- Campo p_iva --}}
              <div class="form-group row">
                <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                <div class="col-md-6">
                  <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                    value="{{ old('p_iva') }}" required>

                  @error('p_iva')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- Campo email --}}
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- Campo password --}}
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

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
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    required autocomplete="new-password">
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Registrati') }}
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
