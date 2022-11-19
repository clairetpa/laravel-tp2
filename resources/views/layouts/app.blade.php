
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@40 0;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>

    <body>
        <!-- barre de navigation -->
        @php $locale = session()->get('locale'); @endphp
        <nav class="navbar navbar-dark bg-dark">
            <div class="nav-left">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('etudiant.index')}}" data-link>@lang('accueil.home')</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('article.index')}}" data-link>@lang('article.menu')</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('document.index')}}" data-link>@lang('document.menu')</a>
                    </li>
                </ul>
            </div>
            <div class="nav-right">
                <div class="nav-item dropdown">
                @if(Auth::check())
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->email }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('etudiant.edit', session()->get('etudiant')) }}">@lang('lang.account_settings')</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('lang', 'en') }}" class="dropdown-item">English</a></li>
                        <li><a href="{{ route('lang', 'fr') }}" class="dropdown-item">Francais</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">@lang('lang.logout')</a></li>
                    </ul>
                @else

                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="nav-link" href="{{ route('login')}}" data-link>@lang('login.login')</a></li>
                        <li><a class="nav-link" href="{{ route('etudiant.create')}}" data-link>@lang('accueil.add-student')</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('lang', 'en') }}" class="dropdown-item">English</a></li>
                        <li><a href="{{ route('lang', 'fr') }}" class="dropdown-item">Francais</a></li>
                    </ul>
                @endif

                </div>
            </div>
            
        </nav>
    @yield('content')
    </body>

    <!-- JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</html>