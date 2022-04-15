@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="mb-5 title">
                        <h3><i class="fa-solid fa-angle-right"></i> Dashboard</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Lato sinistro --}}
                <div class="col-md-5 left">
                    <div class="text-center title">
                        <h4>Riepilogo informazioni</h4>
                    </div>
                    <div class="avatar-container">
                        @if (Auth::user()->image)
                            <img id="propic" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Avatar"
                                class="img-fluid avatar">
                        @else
                            <img id="propic" src="{{ asset('./images/restaurant-placeholder.png') }}" alt="Avatar"
                                class="img-fluid placeholder-avatar">
                        @endif

                        {{-- Cambia immagine --}}
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('users.imageupdate', Auth::user()) }}">
                            <div class="form-group row">
                                @csrf
                                @method('PATCH')

                                <label class="inputImageLabel" for="image"
                                    class="col-md-4 col-form-label text-md-right">Cambia
                                    immagine</label>
                                <input type="file" name="image" id="image" class="inputImage">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="inputImageSubmit hidden btn btn-primary mr-2">
                                    Salva
                                </button>
                            </div>
                        </form>
                    </div>

                    <ul>
                        <li><strong>Nome attività: </strong> {{ Auth::user()->business_name }}</li>
                        <li><strong>Indirizzo: </strong> {{ Auth::user()->address }}</li>
                        <li><strong>Email: </strong> {{ Auth::user()->email }}</li>
                        <li><strong>Partita IVA: </strong> {{ Auth::user()->p_iva }}</li>
                        <li><strong>Categorie: </strong>
                            @foreach (Auth::user()->categories as $category)
                                <span class="category">{{ $category->name }} </span>
                            @endforeach
                        </li>
                    </ul>
                    <a href="{{ route('auth.edit', [Auth::user()->id]) }}" class="btn btn-primary edit">Modifica
                        informazioni</a>
                </div>

                {{-- Lato destro --}}
                <div class="col-md-7 right">
                    <h2 class="mt-3">Bentornato!</h2>
                    <h5>Da qui puoi amministrare la pagina della tua attività.</h5>
                    <div class="row text-center mx">
                        <div class="col-lg">
                            <a href="/"><i class="fa-solid fa-house"></i>
                                Home</a>
                        </div>
                        <div class="col-lg">
                            <a href="#"><i class="fa-solid fa-eye"></i>
                                Anteprima attività</a>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg">
                            <a href="{{ route('auth.dish.index') }}"><i class="fa-solid fa-utensils"></i>
                                Visualizza menù</a>
                        </div>
                        <div class="col-lg">
                            <a href="#"><i class="fa-solid fa-list-check"></i>
                                Visualizza ordini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    propic.src = URL.createObjectURL(file)
                    document.querySelector(".inputImageSubmit").classList.remove("hidden")
                }
            }
        </script>

        <style>
            .inputImage {
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            .inputImageLabel {
                font-size: 1.25em;
                font-weight: 700;
                color: white;
                background-color: black;
                display: inline-block;
                cursor: pointer;
                position: absolute;
                bottom: -10px;
            }

            .inputImageLabel:hover {
                background-color: red;
            }

            .inputImageSubmit {
                position: absolute;
                right: 0;
                bottom: -10px;
            }

            .hidden {
                display: none;
            }

            .category {
                text-transform: capitalize;
            }

        </style>
    </div>
@endsection
