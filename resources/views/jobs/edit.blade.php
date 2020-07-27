@extends('layouts.app')

@section('content')
</br>
</br>
</br>
<div class="container">
    <div class="row justify-content-center">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Job</div>

                <div class="card-body">
                <form action="{{route('jobs.update',[$job->id])}}" method="POST">@csrf
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Job Title:</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$job->title}}">
                            
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Job Description:</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Job Roles & Responsibilites:</label>
                            <textarea name="roles" class="form-control @error('roles') is-invalid @enderror"></textarea>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('roles') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Job Position:</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('position') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Job Address:</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Job Type:</label>
                            <select class="form-control" name="type">
                                <option value="fulltime">Full Time</option>
                                <option value="parttime">Part Time</option>
                                <option value="contract">Contract</option>
                                <option value="online">Onlline</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Post Status:</label>
                            <select class="form-control" name="status">
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Apply by date:</label>
                            <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_date') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success float-right" type="submit">Submit</button>
                    </div>
                </form>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
