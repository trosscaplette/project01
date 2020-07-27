@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @foreach($applicants as $applicant)
            <div class="card">
                <div class="card-header">
                    <a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}">
                        {{$applicant->title}}
                    </a>
                </div>
                    <div class="card-body">
                        <table class="table">
                        @foreach($applicant->users as $user)
                            <thead>
                                
                            </thead>
                            <tbody>
                                <tr>
                                <td>Name:&nbsp;{{$user->name}}</td>
                                <td>Address:&nbsp;{{$user->profile->address}}</td>
                                <td>Contact:&nbsp;{{$user->profile->phone}}</td>
                                <td>Email:&nbsp;{{$user->email}}</td>
                                <td><button class="btn btn-primary"><a class="text-white" href="{{Storage::url($user->profile->resume)}}" target="_blank">Resume</a></button></td>
                                <td><button class="btn btn-success"><a class="text-white" href="{{Storage::url($user->profile->cover_letter)}}" target="_blank">Cover Letter</a></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection
