@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">View All Users</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Date Created:</th>
                                <th scope="col">Name:</th>
                                <th scope="col">Address></th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email:</th>
                                
                                <th scope="col">Cover Letter</th>
                                <th scope="col">Resume</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>Name:&nbsp;{{$user->name}}</td>
                                
                                    <td>Email:&nbsp;{{$user->email}}</td>
                                    <td>Phone:&nbsp;{{$user->profile->dob}}</td>
                                </tr>
                            </tbody>
                                @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    <button class=" btn btn-primary float-left"><a class="text-white" href="/dashboard">Back</a></button>
                </div>
            </div>
        </div>
    </div>
    {{$users->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
</div>
@endsection
