@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="mb-5 title">
                        <h1><i class="fa-solid fa-angle-right"></i> Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Lato sinistro --}}
                <div class="col-md-5 left">
                    <div class="text-center title">
                        <h3>Riepilogo informazioni</h3>
                    </div>
                    <div class="avatar-container">
                        @if (Auth::user()->image)
                            <img id="profilePicture" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Avatar"
                                class="img-fluid rounded-circle avatar">
                        @else
                            <img id="profilePicture" src="{{ asset('./images/restaurant-placeholder.png') }}" alt="Avatar"
                                class="img-fluid placeholder-avatar">
                        @endif

                        {{-- Cambia immagine --}}
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('users.imageupdate', Auth::user()) }}" class="image-selector">
                            <div class="form-group row">
                                @csrf
                                @method('PATCH')

                                <div class="btn image-btn btn-danger m-1 delete d-none">
                                    <i class="fa-solid fa-trash mx-2"></i>
                                </div>
                                <label for="image" class="btn btn-primary update"><i class="fa-solid fa-camera"></i></label>
                                <input type="file" name="image" id="image" class="d-none">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn image-btn btn-success m-1 confirm d-none">
                                    <i class="fa-solid fa-check mx-2"></i>
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
                            @forelse (Auth::user()->categories as $category)
                                <span class="category">{{ $category->name }}</span>
                            @empty
                                <span>Nessuna</span>
                            @endforelse
                        </li>
                    </ul>
                    <a href="{{ route('auth.edit', [Auth::user()->id]) }}" class="btn btn-primary edit"><i
                            class="fa-solid fa-user-pen mx-2"></i> Modifica
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
            // Variabili immagine
            let profilePicture = document.getElementById("profilePicture");
            let ogProfilePictureURL = profilePicture.src;
            let profilePictureInput = document.getElementById("image");

            // Variabili bottoni
            let buttons = document.querySelectorAll(".image-selector .image-btn");
            let btnDelete = document.querySelector(".image-selector .btn.delete");

            imageUpdate();

            // Gestisce la modifica dell'immagine
            function imageUpdate() {
                // Esegue la funzione se vengono caricati file
                profilePictureInput.onchange = evt => {
                    // Salva il file caricato
                    let [file] = profilePictureInput.files;
                    // Se è presente un file esegue le istruzioni seguenti
                    if (file) {
                        profilePicture.src = URL.createObjectURL(file);

                        // Mostra i bottoni
                        buttons.forEach(button => {
                            button.classList.remove("d-none");
                        });

                        // Gestisce il bottone annulla
                        btnDelete.onclick = function() {
                            // Reimposta l'immagine originale
                            profilePicture.src = ogProfilePictureURL;
                            // Rimuove i bottoni e svuota il file input
                            buttons.forEach(element => {
                                element.classList.add("d-none");
                            });
                            profilePictureInput.value = "";
                        }
                    }
                }
            }
        </script>
    </div>
@endsection
