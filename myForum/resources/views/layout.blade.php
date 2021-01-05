<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>myForum</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/dist/css/bootstrap.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="/js/app.js"></script>
    @stack('scripts')
</head>

<body>
    <div class="w-100 bg-primary font-weight-bolder p-5 navbar"><a class="text-reset" href="/">
            <h1 style="color:white;">My Forum</h1>
        </a></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">


                @if (Auth::check())

                    <form method="post" class="nav-item" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">Logout
                            {{ Auth::user()->pseudo }}</a>
                    </form>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                    </li>
                @endif

            <li class="nav-item"><a href="{{ route('themes.index') }}" class="btn btn-primary">Gestion des thèmes</a>
            </li>
            <li class="nav-item"><a href="{{ route('references.index') }}" class="btn btn-primary">Gestion des
                    références</a></li>
            <li class="nav-item"><a href="{{ route('roles.index') }}" class="btn btn-primary">Gestion des rôles</a></li>
            <li class="nav-item"><a href="{{ route('states.index') }}" class="btn btn-primary">Gestion des états</a>
            </li>
            <li class="nav-item"><a href="{{ route('themes.index') }}" class="btn btn-primary">Modération</a></li>
        </ul>
    </nav>
    @if ($message = Session::get('message'))
        <div class="w-100 container text-center alert-success alert-block mb-3 flashmessage">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container p-3">
        @yield ('content')
    </div>
</body>

</html>
