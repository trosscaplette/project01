@extends('layouts.app')

@section('content')
</br>
</br>
</br>
<div class="container">
    <div class="company-profile">
        @if(empty($company->cover_photo))
            <img class="company-image border border-dark" src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width:100%;">
        @else
            <img class="company-image border-top border-left border-dark" src="{{asset('cover/cover_photo.jpg')}}" style="width:100%;">
        @endif
    </div>
    <div class="company-logo">
        @if(empty($company->logo))
            <img class="company-logo rounded-circle" width="150" src="{{asset('uploads/logo')}}/{{$company->logo}}">
	    @else
            <img class="company-logo border border-light rounded-circle" width="150" src="{{asset('avatar/man.jpg')}}">
	    @endif
    </div>
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-transform:uppercase;">{{$company->cname}}</h1>
                <p>{{$company->address}}&nbsp;|&nbsp;{{$company->phone}}</p>
                <p>{{$company->slogan}}</p>
                <p>{{$company->description}}</p>
            </div>
        </div>
        <br>
        <table class="table">
</br>
</br>
            <tbody>
                @foreach($company->jobs as $job)
                <tr>
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
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-success btm-sm">View Job</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
