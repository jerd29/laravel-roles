<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}

    <script src="{{ asset('js/alertify.js') }}"></script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/alertify.css') }}" rel="stylesheet">


<script src="{{'js/fontawesome.js'}}"></script>

</head>

@yield('css')

<body>
    <div id="app">
        {{-- <div class="cintillo" style="background-color: #343a40;">
            <img style=" height:100px;" class="ml-1" src="{{ asset('img/cintillo.png') }}" alt="" srcset="">
        </div> --}}

        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        @endguest
                        


                        @role('usuario|admin|super-admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>

                            

                            @if(
                                auth()->user()->can('editar usuarios') || 
                                auth()->user()->can('eliminar usuarios') ||
                                auth()->user()->can('crear usuarios')
                                )

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('crudUser') }}">{{ __('Usuarios') }}</a>
                                </li>

                            @endif


                            @if(
                                auth()->user()->can('editar roles') || 
                                auth()->user()->can('eliminar roles') ||
                                auth()->user()->can('crear roles')
                                )
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('showroles') }}">{{ __('Roles') }}</a>
                                </li>
    
                            @endif

                            @role('super-admin')


                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('showpermisos') }}">{{ __('Permisos') }}</a>
                                </li>
                                
                            @endrole

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                         @endrole





                        
                    </ul>
                </div>
            </div>
            <img style="width: 4%;" class="logocomuna" src="{{ asset('img/comunas.png') }}" alt="" srcset="">

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('js')

</body>
</html>
