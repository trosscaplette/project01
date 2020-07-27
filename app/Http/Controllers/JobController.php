<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;
use Auth;
use App\User;

class JobController extends Controller
{
    public function __construct(){
        $this->middleware(['employer','verified'],['except'=>array('index','show','apply','allJobs','searchJobs')]);
    }
    public function index(){
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $companies = Company::get()->random(8);
        $countAllJobs = Job::latest()->where('status', 1)->get();
        return view('welcome',compact('jobs','companies','countAllJobs'));
    }

    public function show($id,Job $job){
        return view('jobs.show',compact('job'));
    }

    public function company(){
        return view('company.index');
    }

    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        return view('jobs.edit',compact('job'));
    }

    public function update(Request $request,$id){
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with()('message','Your job has been updated!');
    }

    public function applicant(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicants',compact('applicants'));
    }
    
    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id'=> $user_id,
            'company_id'=> $company_id,
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date')
        ]);

        return redirect()->back()->with('message','Your job has been posted successfully!');
    
    }

    public function apply(Request $request,$id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Your application has been sent!');
    
    }

    public function allJobs(Request $request){
        $keyword = $request->get('title');
        $type = $request->get('type');
        $address = $request->get('address');
        if($keyword||$type||$address){
            $jobs = Job::where('title','LIKE','%'.$keyword.'%')
            ->orWhere('type',$type)
            ->orWhere('address','LIKE'.'%'.$address.'%')
            ->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
        }else{

        $jobs = Job::latest()->where('status', 1)->paginate(10);
        $countAllJobs = Job::latest()->where('status', 1)->get();
        return view('jobs.alljobs',compact('jobs','countAllJobs'));
        }

    }

    public function searchJobs(Request $request){
        $keyword = $request->get('keyword');
        $users = Job::where('title','like','%'.$keyword.'%')
            ->orWhere('position','like','%'.$keyword.'%')
            ->limit(5)->get();
        return response()->json($users);
    }

}

