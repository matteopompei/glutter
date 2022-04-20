<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/backoffice.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            header{
                position: fixed;
                width: 100%;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }

            .my_404-btn{
                background-color: #f2cc8f;
                color: #f8f9fa;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <header>
                <nav class="navbar navbar-expand-md navbar-light bg-light py-3">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('./images/Glutter1-dashboard.png') }}" alt="Glutter" class="img-fluid logo">
                    </a>
                </nav>
            </header>
        </div>
        <div class="flex-center position-ref full-height">
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>

            <div>
                <a href="{{ route('auth.dish.index') }}" class="btn my_404-btn text-uppercase mx-2">Torna alla lista dei piatti</a>
            </div>
        </div>
    </body>
</html>
