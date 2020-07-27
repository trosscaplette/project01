@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <ul class="nav flex-column position-fixed">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.view') }}">
                    {{ __('Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/home">Saved Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/namecards">NameCard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.company')}}">Featured Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            @if(Auth::user()->user_type=='seeker')
                
                    <div class="card-body text-center align-middle">
                        <span>You have not made a NameCard yet.</span>
                        <p>Create your NameCard</p>
                        <a href="{{ route('namecards.view') }}"><button class="btn btn-outline-primary">Here:</button></a>
                    </div>
                
                @else
                        
                You're logged in 


                @endif
                      
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
