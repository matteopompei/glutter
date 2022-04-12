<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Glutter</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div id="app">
    <header>
      <nav class="navbar navbar-light bg-light py-3">
        <a class="navbar-brand" href="#">Glutter</a>

        <div class="form-inline user">
          @guest
            <a href="{{ route('login') }}">Accedi</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="btn btn-primary text-uppercase">Registrati</a>
            @endif
          @else
            <a href="{{ route('logout') }}" class="btn btn-danger text-uppercase"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        @endguest
      </nav>
    </header>

    <main class="my-5">
      @yield('content')
    </main>
  </div>
</body>

</html>
