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
            
            <table class="table table-striped">
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td class="rounded-top">
                            <div class="float-right"><small>&nbsp;{{$company->created_at->diffForHumans()}}</small></div>
                            <div class="col-10 float-left"><a href="{{route('company.index',[$company->id,$company->slug])}}" style="text-decoration:none;">{{str_limit($company->description,100)}}</a><div>
                            <div class="float-left"><small><p>{{$company->cname}}</p></small></div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>    
                

            @endif
                      
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
