@extends('laracrud::layouts.app')

@section('parent-content')
    <nav class="navbar navbar-expand-lg navbar-light bg-lightgreen">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <i class="fal {{ config('laracrud.icon') }} text-success"></i> {{ config('app.name') }}
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @include('laracrud::layouts.nav')
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

                                <div class="dropdown-menu dropdown-menu-right">
                                    <button type="button" class="dropdown-item" data-modal="{{ route('profile') }}">Profile</button>
                                    <button type="button" class="dropdown-item" data-modal="{{ route('password') }}">Password</button>
                                    <form method="POST" action="{{ route('logout') }}" >
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3 mb-5">
        @yield('child-content')
    </div>
@endsection
