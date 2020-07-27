@extends('layouts.app')

@section('content')
</br>
</br>
</br>
<div class="container">
        <div class="col-md-12">
            <search-component></search-component>
            </br>
        </div>
        <div class="float-left">
                <p>We have&nbsp;{{ $countAllJobs->count() }}&nbsp;jobs.</p>
            </div>
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
                                <p class="mt-0 mb-3">{{$job->company->cname}}</p>
                                <a class="" href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-outline-primary">View Job</button</a>
                        </div>
                        </br>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
    </div>
</div>
@endsection
<style>
.fa{
    color: #4183D7
}
</style>