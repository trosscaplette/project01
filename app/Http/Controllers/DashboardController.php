<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Profile;
use App\User;
use Auth;


class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function getAllJobs(){
        $jobs = Job::latest()->paginate(10);
        return view('admin.jobs',compact('jobs'));
    }

    public function getAllUsers(){
        $users = User::latest()->paginate(10);
        return view('admin.users',compact('users'));
    }
    

    public function changeJobStatus($id){
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();
        return redirect()->back()->with('message','The job status has been updated.');
    }

}
