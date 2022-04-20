<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Glutter') }} - @yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/backoffice.css') }}">
</head>

<body>
  <div id="app">
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-light py-3">
        <a class="navbar-brand" href="/">
          <img src="{{ asset('./images/Glutter1-dashboard.png') }}" alt="Glutter" class="img-fluid logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <div class="form-inline mt-5 mb-3 my-md-2 justify-content-center user">
            @guest
              <a href="{{ route('login') }}" class="btn mx-2">Accedi</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-success text-uppercase mx-2">Registrati</a>
              @endif
            @else
              <a href="{{ route('logout') }}" class="btn btn-danger text-uppercase mx-2"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            @endguest
          </div>
        </div>
      </nav>
    </header>

    <main class="my-5">
      <div class="container">
        {!! session()->get('serverMessage') !!}
      </div>
      @yield('content')
    </main>
  </div>

  <script src="{{ asset('js/backoffice.js') }}" defer></script>
</body>

</html>
