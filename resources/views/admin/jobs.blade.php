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
                    <h3 class="float-left">View All Jobs</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Date Created:</th>
                                <th scope="col">Company</th>
                                <th scope="col">Position:</th>
                                <th scope="col">Last Apply Date:</th>
                                <th scope="col">Job Status</th>
                                <th scope="col">Job</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                                <th scope="row">{{date('Y-m-d',strtotime($job->created_at))}}</th>
                                <td>{{$job->company->cname}}</td>
                                <td>{{$job->position}}</td>
                                <td>{{$job->last_date}}</td>
                                <td>
                                    @if($job->status=='0')
                                        <a href="{{route('job.status',[$job->id])}}" class="badge badge-primary">Draft</a>
                                    @else
                                        <a href="{{route('job.status',[$job->id])}}" class="badge badge-success">Live</a>
                                    @endif
                                </td>
                                <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-info" target="_blank">View Job<a></td>
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
    {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
</div>
@endsection
