<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome --> 
    <script src="https://kit.fontawesome.com/dba7500aab.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="fixed-top navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('/storage/namdaemun.png')}}" class="rounded-circle" style="width:65px;">
                    Esl Gateway
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
                            <li class="nav-item nav-button">
                                <a class="text-dark nav-link" href="{{ route('register') }}">{{ __('Upload Resume') }}</a>
                            </li>
                            <li class="nav-item nav-button">
                                <a class="text-dark nav-link mr-3" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                            </li>
                            <li class="nav-item nav-button">
                            <a class="text-white" href="{{ route('emp.register') }}"><button type="button" class="btn btn-primary">{{ __('Post a Job') }}</button></a>
                            </li>
                        @else
                        <!-- Once the user is logged in -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->user_type=='employer')
                                        {{ Auth::user()->company->cname}}
                                    @else
                                        {{ Auth::user()->name }} 
                                    @endif
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type=='seeker')
                                    <a class="dropdown-item" href="{{ route('home') }}"
                                       >{{ __('Dashboard') }}
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('company.view') }}"
                                       >{{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('my.jobs')}}">
                                        My Jobs
                                    </a>
                                    <a class="dropdown-item" href="{{route('applicants')}}">
                                        Job Applicants
                                    </a>
                                    @endif
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
                            <li>
                            @if(Auth::user()->user_type=='employer')
                                <a href="{{route('jobs.create')}}">
                                        <button class="btn btn-secondary">
                                            Post a Job
                                        </button>
                                    </a>
                                </li>
                            @else
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
   
</body>
</html>
