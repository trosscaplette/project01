@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="cover-photo col-md-12">
                @if($errors->has('coverphoto'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$errors->first('coverphoto')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> 
                    </div>
                        @endif
                        

                    <form action="{{route('company.cover.photo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control" name="cover_photo">
                        <button class="btn btn-sm btn-dark float-right" type="submit">Update</button>
                    </form>
                    </br>
                    </br>
                <div class="">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                </div>
        </div>
        <div class="col-md-3">
            @if($errors->has('logo'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$errors->first('logo')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> 
                </div>
            @endif
            
            <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card">
                    <div class="card-header">Update Your Photo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="logo">
                        </br>
                        <button class="btn btn-dark float-right" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Company information.</div>

                <form action="{{route('company.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{Auth::user()->company->phone}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" name="website" class="form-control" value="{{Auth::user()->company->website}}">
                                
                        </div>
                        <div class="form-group">
                            <label for="type">Be Featured</label>
                            <select class="form-control" name="status">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Company Slogan</label>
                            <textarea name="slogan" class="form-control">{{Auth::user()->company->slogan}}</textarea>
                                
                        </div>
                        <div class="form-group">
                            <label for="">Company Description</label>
                            <textarea name="description" class="form-control">{{Auth::user()->company->description}}</textarea>
                                
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark float-right" type="submit">Update</button>
                        </div>
                        </br>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Company Details:</div>
                    <div class="card-body">
                        <p>Company Name:&nbsp;{{Auth::user()->company->cname}}</p>
                        <p>Company Address:&nbsp;{{Auth::user()->company->address}}</p>
                        <p>Company Phone:&nbsp;{{Auth::user()->company->phone}}</p>
                        <p>Company Website:&nbsp;<a href="{{Auth::user()->company->website}}" target="_blank">{{Auth::user()->company->website}}</a></p>
                        <p>Company Slogan:&nbsp;{{Auth::user()->company->slogan}}</p>
                        <p>Company Description:&nbsp;{{Auth::user()->company->description}}</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark" style="width:100%"><a class="text-white" target="_blank" href="company/{{Auth::user()->company->slug}}">View Company Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
