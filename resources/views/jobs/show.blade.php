@extends('layouts.app')

@section('content')
</br>
</br>
</br>
<div class="container">
    <div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('err_message'))
            <div class="alert alert-danger">
                {{Session::get('err_message')}}
            </div>
        @endif
        @if(isset($errors)&&count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left mt-2 col-10">{{$job->title}}</h4>
                    <a class="float-right" href="#" data-toggle="modal" data-target="#sendjobModal">
                        <i class="far fa-paper-plane mt-1 text-primary" style="font-size:32px;"></i>
                    </a>
                </div>
                <div class="card-body">
                    <p>
                        <h3 class="text-black mb-3">Job Description</h3>
                        {{$job->description}}
                    </p>
                    <hr>
                    <p>
                        <h3 class="text-black mb-3">Roles and Responsibilities</h3>
                        {{$job->roles}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" style="text-transform:uppercase;">
                        {{$job->company->cname}}
                    </a>
                    <p class="mb-0">{{$job->address}}</p>
                </div>
                    <div class="card-body">
                        <p>Employment Type:&nbsp;{{$job->type}}</p>
                        <p>Position:&nbsp;{{$job->position}}</p>
                        <p>Posting date:&nbsp;{{$job->created_at->diffForHumans()}}</p>
                        <p>Closing date:&nbsp;{{ date('F d, Y',strtotime($job->last_date)) }}</p>
                    </div>
                    <div class="card-footer">
                    @if(Auth::check()&&Auth::user()->user_type=='seeker')
                        @if(!$job->checkApplication())
                            <apply-component jobid="{{$job->id}}"></apply-component>
                        @endif
                        <br>
                            <favourite-component jobid="{{$job->id}}"
                                :favourited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                    @else
                        <a href="{{ route('login') }}"><button class="btn btn-primary" style="width:100%">Apply Now</button></a>
                    @endif

                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="sendjobModal" tabindex="-1" role="dialog" aria-labelledby="sendjobModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sendjobModalLabel">
                                Email This Job
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form acton="{{route('mail')}}" method="POST">@csrf
                            <div class="modal-body">
                                <input type="hidden" name="job_id" value="{{$job->id}}">
                                <input type="hidden" name="job_slug" value="{{$job->slug}}">
                                
                                <div class="form-group">
                                    <label>Sender's Name *</label>
                                    <input type="text" name="sender_name" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Sender's Email *</label>
                                    <input type="email" name="sender_email" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Receiver's Name *</label>
                                    <input type="text" name="receiver_name" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Reciever's Email *</label>
                                    <input type="email" name="receiver_email" class="form-control" required="">
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
