<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
    <!-- and it's easy to individually load additional languages -->
    <script charset="UTF-8"
    src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/languages/go.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

    @toastr_css



</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('forum') }}">
                    Forum
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if (count($errors) > 0)
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{route('discuss.create')}}" class="form-control btn btn-primary">
                            Create a discussion
                        </a>
                        <br>
                        <br>
                        <div class="card mb-3">
                            <div class="card-body">
                                    <li class="list-group-item">
                                        <a href="{{route('forum')}}">
                                            Home
                                        </a>
                                    </li>
                                    <div class="list-group-item">
                                        <a href="/forum?filter=me">
                                            My discussions
                                        </a>
                                    </div>
                            </div>
                        </div>
                        <div class="card">
                            {{-- If user is admin he or she) can edit and delete channels --}}
                            <div class="card-header">
                                <a @if (Auth::check() && Auth::user()->admin)
                                    href="{{route('channels.index')}}"
                                @endif>Channels</a>
                            </div>

                            <div class="card-body">
                                @foreach ($channels as $channel)
                                    <li class="list-group-item">
                                        <a href="{{route('discuss.showChannel', ['channel' => $channel->id])}}">
                                            {{$channel->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">

                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

    </div>
    @yield('scripts')

</body>
@jquery
    @toastr_js
    @toastr_render


</html>
