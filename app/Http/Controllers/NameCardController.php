<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\NameCard;

class NameCardController extends Controller
{
    public function __construct(){
        $this->middleware(['seeker','verified'],['except'=>array('index')]);
    }
    
    public function index(){
        $namecards = Namecard::latest()->limit(20)->where('status',1)->get();
        //return view('namecards.index',compact('namecards')); -> this returns all namecards
        return view('namecards.index');
    } //This might have to change//

    public function show($id,Namecard $namecard){
        return view('namecards.show',compact('namecard'));
    }

    public function create(){
        return view('namecards.create');
    }

    public function store(Request $request){
        //NamecardPostRequest needs to be made
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id',$user_id)->first();
        $profile_id = $profile->id;
        Namecard::create([
            'user_id'=> $user_id,
            'profile_id'=> $profile_id,
            'name'=>request('name'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'status'=>request('status'),
            'email'=>request('email'),
            'education'=>request('education'),
            'description'=>request('description'),
            'avatar'=>request('avatar'),
            'last_date'=>request('last_date')
        ]);

        return redirect()->back()->with('message','Your namecard has been posted successfully!');
    
    }

    public function searchNameCards(Request $request){
        $keyword = $request->get('keyword');
        $users = NameCard::where('','like','%'.$keyword.'%')
            ->orWhere('','like','%'.$keyword.'%')
            ->limit(5)->get();
        return response()->json($users);
    }
}

