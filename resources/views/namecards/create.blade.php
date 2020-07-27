@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.view') }}">
                    {{ __('Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/">Saved Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/namecards">NameCard</a>
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
            <div class="card">
                <div class="card-header">Create your NameCard</div>

                <div class="card-body">
                <form action="" method="POST">@csrf
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name="" class="form-control @error('') is-invalid @enderror">
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="type" name="education" class="form-control @error('education') is-invalid @enderror">
                            <select class="form-control" name="status">
                                <option value="0">Bachelor's Degree (Ba)</option>
                                <option value="1">Master's Degree (Ma)</option>
                                <option value="2">Doctor of Philosophy (PhD)</option>
                            </select>
                            @error('')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('education') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Post Status:</label>
                            <select class="form-control" name="status">
                                <option>Select below to continue editing or to go live:</option>
                                <option value="1">Go Live!</option>
                                <option value="0">Continue Editing</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success float-right" type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
</div>
@endsection
