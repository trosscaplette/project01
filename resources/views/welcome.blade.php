@extends('layouts.app')

@section('content')

@include('partials.hero')
<div class="container">
    <div class="row">
        <div class="container-fluid">
        
        <table class="table table-striped">
            <tbody>
            <p>We have&nbsp;{{ $countAllJobs->count() }}&nbsp;jobs.</p>
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
        </div>
        <a class="btn alert alert-info btn" href="{{route('alljobs')}}" style="width:100%"><strong>View All Jobs</strong></a>
    </div>
    <br><br>
    <div class="text-center">
        <h1>Featured Companies</h1> 
    </div>   
    <br><br> 
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-md-10 mx-auto">
        @foreach($companies as $company)
            @if(empty($company->logo))
                <a href="{{route('company.index',[$company->id,$company->slug])}}" class="">
                    <img src="{{asset('uploads/employer/logo')}}/{{$company->logo}}" class="img-thumbnail rounded mb-2 mr-2" width="35">        
                </a>
            @else
                <a href="{{route('company.index',[$company->id,$company->slug])}}" class="">
                    <img src="{{asset('logo/logo.png')}}" class="img-thumbnail rounded mb-2 mr-2" width="175">  
                </a>      
            @endif
        @endforeach
        </div>
    </div>
</div>

@endsection
<style>
.fa{
    color: #4183D7
}
</style>