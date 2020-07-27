@extends('layouts.app')

@section('content')
</br>
</br>
</br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>
                    @if(empty(Auth::user()->company->logo))
                        <img src="{{asset('logo/logo.png')}}" class="rounded-circle"style="width:50%;">
                    @else
                        <img src="{{asset('uploads/employer/logo')}}/{{Auth::user()->company->logo}}" class="rounded-circle" style="width:50%;">
                    @endif
                    </td>
                    <td>{{$job->position}}
                        <br>
                        <i class="fa fa-clock-0" aria-hidden="true"></i>{{$job->type}}
                    </td>
                    <td>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$job->address}}
                    </td>
                    <td>
                        <i class="fa fa-globe" aria-hidden="true"></i><small>&nbsp;Posted:&nbsp;{{$job->created_at->diffForHumans()}}</small>
                    </td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success" style="width:100%">View</button>
                        </a>
                        <a href="{{route('jobs.edit',[$job->id])}}">
                            <button class="btn btn-primary mt-3" style="width:100%">Edit</button>
                        </a>
                        <a href="">
                            <button class="btn btn-danger mt-3" style="width:100%">Delete</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
