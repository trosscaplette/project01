@extends('layouts.app')

@section('content')
</br>
</br>
</br>
<div class="container">
    <div class="row justify-content-center">
        
        @include('partials.usernav')

        <div class="col-md-10">
            @if(Auth::user()->user_type=='seeker')

            <div class="card">
                    <div class="card-header mb-2">
                        Job Title
                    </div>
                    <small class="badge badge-pill badge-info pb-1 pt-2 ml-3" style="width:20%;"></small>
                        <div class="card-body">
                            Read More
                        </div>
                        <div class="card-footer">
                            <span>
                                <a class="float-right" href="#">
                                    <button class="btn btn-success">
                                        Apply Now
                                    </button>
                                </a>
                            </span>
                            <span class="mt-2">
                                Last date to apply:&nbsp;
                            </span>
                       </div>
            </div>
            @endif
                      
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
@endsection
