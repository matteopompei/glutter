@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title">
                        <h3><i class="fa-solid fa-angle-right"></i> Registrati</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col login-form">
                    {{-- Form di registrazione --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Campo business_name --}}
                        <div class="form-group row">
                            <label for="business_name" class="col-md-4 col-form-label text-md-right">Nome attività</label>

                            <div class="col-md-6">
                                <input id="business_name" type="text"
                                    class="form-control @error('business_name') is-invalid @enderror" name="business_name"
                                    value="{{ old('business_name') }}" minlength="3" required>

                                @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo category --}}
                        <div class="form-group">
                            <label for="categories" class="col-md-4 col-form-label text-md-right">Categorie</label>

                            <div class="col-md-6">
                                @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="categories[]" type="checkbox"
                                            value="{{ $category->id }}" id="category{{ $category->id }}">
                                        <label class="form-check-label" for="category{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Campo Via --}}
                        <div class="form-group row">
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
                        </div>

                        {{-- Campo numero civico --}}
                        <div class="form-group row">
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
                        </div>

                        {{-- Campo città --}}
                        <div class="form-group row">
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
                        </div>

                        {{-- Campo provincia --}}
                        <div class="form-group row">
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
                        </div>

                        {{-- Campo CAP --}}
                        <div class="form-group row">
                            <label for="cap" class="col-md-4 col-form-label text-md-right">CAP</label>

                            <div class="col-md-6">
                                <input id="cap" type="text" class="form-control @error('cap') is-invalid @enderror"
                                    name="cap" value="{{ old('cap') }}" minlength="5" maxlength="5" required>

                                @error('cap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo p_iva --}}
                        <div class="form-group row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">Partita IVA</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror"
                                    name="p_iva" value="{{ old('p_iva') }}" minlength="11" maxlength="11" required>

                                @error('p_iva')
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
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Campo password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    minlength="8" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma
                                Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
