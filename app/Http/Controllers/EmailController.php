<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendJob;

class EmailController extends Controller
{
    public function send(Request $request){

        $this->validate($request,[
            'sender_name'=>'required|string',
            'sender_email'=>'required|email',
            'receiver_name'=>'required|string',
            'receiver_email'=>'required|email'
        ]);
        $homeUrl = url('/');
        $jobId = $request->get('job_id');
        $jobSlug = $request->get('job_slug');

        $jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;

        $data = array(
            'sender_name'=>$request->get('sender_name'),
            'sender_email'=>$request->get('sender_email'),
            'receiver_name'=>$request->get('receiver_name'),
            'receiver_email'=>$request->get('receiver_email'),
            'jobUrl'=>$jobUrl
        );

        $emailTo = $request->get('receiver_email');
        try{
        Mail::to($emailTo)->send(new SendJob($data));
        return redirect()->back()->with('message','You have send a job to '.$emailTo);
        }catch(\Exception $error){
            return redirect()->back()->with('err_message','You were unable to send this job to '.$emailTo .'Please try again later. ');
        
        }
    }
}
