<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <header class="header">
        <div class="header__title">FashionablyLate
        </div>
        <div class="header__button-area">
        @yield('button')
        </div>
    </header>
    
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

@yield('css')
</head>
<body>
 
<main>
    @yield('content')
    </main>

    
</body>
</html>