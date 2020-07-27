@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">

        @include('partials.usernav')
        
    
        <div class="col-md-10">
            @if(Auth::user()->user_type=='seeker')
            @if(count($jobs)>0)
                <table class="table table-striped">
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>
                                <div class="float-right"><small>&nbsp;{{$job->created_at->diffForHumans()}}</small></div>
                                <div class="col-md-10 float-left">
                                        <p class="mb-1"><a href="{{route('jobs.show',[$job->id,$job->slug])}}" style="text-decoration:none;">{{str_limit($job->description,200)}}</a></p>
                                        <p class="mt-0 mb-0" style="text-transform:uppercase;">{{$job->position}}</p>
                                        <p class="mt-0 mb-0" style="text-transform:uppercase;">{{$job->type}}</p>
                                        <p class="mt-0 mb-0">$23,000 - $35,000</p>
                                        <p class="mt-0 mb-3"><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">{{$job->company->cname}}</a></p>
                                        <a class="" href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-outline-primary">View Job</button</a>
                                </div>
                                </br>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    @else
                    <div class="card-body text-center align-middle">
                        <span>You do not have any favourite jobs.</span>
                        <p>Start searching jobs</p>
                        <a href="{{ route('alljobs')}}"><button class="btn btn-outline-primary">Here</button></a>
                    </div>
                    @endif
                    @else
                        
                    You're logged in 


                    @endif
                      
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
