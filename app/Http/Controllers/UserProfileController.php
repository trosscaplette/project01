<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Company;

class UserProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['seeker','verified'],['except'=>array('show')]);
    }
    public function index(){
        return view('profile.index');
    }

    public function show($id){
        return view('profile.show');
    }

    public function company(){
        $companies = Company::get()->random(8);
        return view('profile.company',compact('companies'));
    }

    public function featuredjobs(){
   //     $featuredjobs = Job::latest()->limit(10)->where('status',1)->get();
       return view('profile.featuredjobs');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'bio'=>request('bio')
        ]);
        $this->validate($request, [
            'address'=>'required',
            'phone'=>'required|numeric',
            'bio'=>'required|min:150|max:750'
        ],[
            'bio.min' => 'Enter a minimum of 150 characters to help employers know why you are so great!.',
        ]);
        return redirect()->back()->with('message','Your profile has been successfully updated!');
    }

    public function coverletter(Request $request){
        $this->validate($request,[
            'cover_letter'=>'required|mimes:pdf'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/
        files');
        Profile::where('user_id',$user_id)->update([
            'cover_letter'=>$cover,
        ]);
        return redirect()->back()->with('message','Your cover letter has been successfully updated!');
    
    }

    public function resume(Request $request){
        $this->validate($request,[
            'resume'=>'required|mimes:pdf'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/
        files');
        Profile::where('user_id',$user_id)->update([
            'resume'=>$resume,
        ]);
        return redirect()->back()->with('message','Your resume has been successfully updated!');
    
    }

    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/seeker/avatar/',$filename);
        }
        Profile::where('user_id',$user_id)->update([
            'avatar'=>$filename,
        ]);
        return redirect()->back()->with('message','Your photo has been successfully updated!');
    
    }

    public function coverphoto(Request $request){
        $this->validate($request,[
            'coverphoto'=>'required|mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('coverphoto')){
            $file = $request->file('coverphoto');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/seeker/coverphoto/',$filename);
        }
        Profile::where('user_id',$user_id)->update([
            'coverphoto'=>$filename,
        ]);
        return redirect()->back()->with('message','Your cover photo has been successfully updated!');
    
    }

    
}

