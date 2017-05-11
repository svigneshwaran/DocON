<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;

class SessionController extends Controller
{
	public function homecheck(Request $request){
		if ($request->session()->has('user')) {
    		return redirect('user/dashboard');
		}
		elseif($request->session()->has('doctor')){
			return redirect('/doctor/dashboard');
		}
		elseif($request->session()->has('medical')){
			return redirect('/medicalshop/dashboard');
		}
		else{
			return view('welcome');
		}
	}
    public function userDashboard(Request $request){
    	if ($request->session()->has('user')) {
    		return view('user.dashboard');
		}
		else return redirect('/');
    }
    public function doctorDashboard(Request $request){
    	if ($request->session()->has('doctor')) {
    		$doctor_uname=$request->session()->get('doctor');
    		$docid=DB::table('doctors')->where('username',$doctor_uname)->first();
    		$result=DB::table('messages')->where('doctorid',$docid->{'id'})->distinct()->get(['userid']);
    		$decode=json_decode($result,true);
    		$size=sizeof($decode);
    		$i=0;
    		while($i<$size){
    			$userdetails=DB::table('users')->where('id',$decode[$i]['userid'])->first();
    			$user_name=$userdetails->{'name'};
    			$profile_pic=$userdetails->{'profile_pic'};
    			$userid=$decode[$i]['userid'];
    			$json[]=array('userid'=>$userid,'user_name'=>$user_name,'profile_pic'=>$profile_pic);
    			$i++;
    		}
    		$json=json_encode($json);
    		return view('doctor.dashboard')->with('users',$json);;
		}
		else return redirect('/');
    }
    public function medical_shop_search(Request $request){
    	if ($request->session()->has('user')) {
    		return view('user.medical_shop_search')->with('flag','1');
    	}
    	else return redirect('/');
    }
    public function medicalDashboard(Request $request){
    	if ($request->session()->has('medical')) {

    		$shopid=$request->session()->get('shopid');
    		$result=DB::table('orders')->where('shopid',$shopid)->get();
    		$json=json_decode($result,true);
    		$count=sizeof($json);
    		$i=0;
            $json1=[];
    		while($i<$count){
    			$fetchname=DB::table('users')->where('id',$json[$i]['userid'])->first();
    			$id=$json[$i]['id'];
    			$name=$fetchname->{'name'};
    			$address=$json[$i]['address'];
    			$phone=$json[$i]['phone'];
    			$json1[]=array('id'=>$id,'name'=>$name,'address'=>$address,'phone'=>$phone,'status'=>$json[$i]['status']);
    			$i++;
    		}
    		return view('medicalshop.dashboard')->with('users',$json1);
    	}
    	else return redirect('/');
    }
    public function orderview(Request $request,$id){
    	if ($request->session()->has('medical')) {
    		$result=DB::table('orders')->where('id',$id)->first();
    		return view('medicalshop.vieworder')->with('users',$result);
    	}
    	else return redirect('/');
    }
    public function doctor_search(Request $request){
    	if($request->session()->has('user')){
    	return view('user.doctor_search')->with('flag','0');
    	}
    	else return redirect('/');
    }
    public function userSignup(Request $request){
    	if($request->session()->has('user')){
    		return redirect('user/dashboard');
    	}
    	else return view('user.signup');
    }
    public function userLogin(Request $request){
    	if($request->session()->has('user')){
    		return redirect('user/dashboard');
    	}
    	else return view('user.login');
    }
    public function doctor_chat(Request $request,$id){
    	if ($request->session()->has('user')) {
    		$userid=$request->session()->get('userid');
    		$userdetails=DB::table('users')->where('id',$userid)->first();
    		$doctordetails=DB::table('doctors')->where('id',$id)->first();
    		$messages=DB::table('messages')->where('userid',$userid)->where('doctorid',$id)->get();
    		$json=array('docname'=>$doctordetails->{'name'},'profile_pic'=>$doctordetails->{'profile_pic'},'username'=>$userdetails->{'name'},'user_prof'=>$userdetails->{'profile_pic'},'userid'=>$userid,'doctorid'=>$id);
    		return view('user.doctor_chat')->with('users',$json)->with('messages',$messages);
    	}
    	else return redirect('/');
    }
    public function doctor_chat_response(Request $request,$id){
        if ($request->session()->has('user')) {
            $userid=$request->session()->get('userid');
            $userdetails=DB::table('users')->where('id',$userid)->first();
            $doctordetails=DB::table('doctors')->where('id',$id)->first();
            $messages=DB::table('messages')->where('userid',$userid)->where('doctorid',$id)->get();
            $json=array('docname'=>$doctordetails->{'name'},'profile_pic'=>$doctordetails->{'profile_pic'},'username'=>$userdetails->{'name'},'user_prof'=>$userdetails->{'profile_pic'},'userid'=>$userid,'doctorid'=>$id);
            return view('user.response')->with('users',$json)->with('messages',$messages);
        }
    }
    public function user_chat(Request $request,$id){
        if ($request->session()->has('doctor')) {
            $doctorid=$request->session()->get('doctorid');
            $userdetails=DB::table('users')->where('id',$id)->first();
            $doctordetails=DB::table('doctors')->where('id',$doctorid)->first();
            $messages=DB::table('messages')->where('userid',$id)->where('doctorid',$doctorid)->get();
            $json=array('docname'=>$doctordetails->{'name'},'profile_pic'=>$doctordetails->{'profile_pic'},'username'=>$userdetails->{'name'},'user_prof'=>$userdetails->{'profile_pic'},'userid'=>$id,'doctorid'=>$doctorid);
            return view('doctor.messages')->with('users',$json)->with('messages',$messages);
        }
        else return redirect('/');
    }
    public function user_chat_response(Request $request,$id){
        if ($request->session()->has('doctor')) {
            $doctorid=$request->session()->get('doctorid');
            $userdetails=DB::table('users')->where('id',$id)->first();
            $doctordetails=DB::table('doctors')->where('id',$doctorid)->first();
            $messages=DB::table('messages')->where('userid',$id)->where('doctorid',$doctorid)->get();
            $json=array('docname'=>$doctordetails->{'name'},'profile_pic'=>$doctordetails->{'profile_pic'},'username'=>$userdetails->{'name'},'user_prof'=>$userdetails->{'profile_pic'},'userid'=>$id,'doctorid'=>$doctorid);
            return view('doctor.response')->with('users',$json)->with('messages',$messages);
        }
    }
    public function doctor_messages(Request $request){
    	if ($request->session()->has('user')) {
    		$userid=$request->session()->get('userid');
    		$result=DB::table('messages')->where('userid',$userid)->distinct()->get(['doctorid']);
    		$decode=json_decode($result,true);
    		$size=sizeof($decode);
    		$i=0;
    		while($i<$size){
    			$doctordetails=DB::table('doctors')->where('id',$decode[$i]['doctorid'])->first();
    			$doctor_name=$doctordetails->{'name'};
    			$profile_pic=$doctordetails->{'profile_pic'};
    			$doctorid=$decode[$i]['doctorid'];
    			$json[]=array('doctorid'=>$doctorid,'doctor_name'=>$doctor_name,'profile_pic'=>$profile_pic);
    			$i++;
    		}
    		$json=json_encode($json);
    		return view('user.doctor_messages')->with('users',$json);
    	}
    	else return redirect('/');
    }
    public function log_out(Request $request){
    	$request->session()->forget('user');
    	$request->session()->forget('doctor');
    	$request->session()->forget('medical');
    	return redirect('/');
    }
    public function messages_add(Request $req){
        $userid=$req->{'userid1'};
        $doctorid=$req->{'doctorid1'};
        $message=$req->{'msg2'};
        $date=date("Y/m/d");
        $time=date("h:i:sa");
        $sender="doctor";
        $insertdata=DB::table('messages')->insert(['userid'=>$userid,'doctorid'=>$doctorid,'message'=>$message,'sender'=>$sender,'date'=>$date,'time'=>$time]);
        return "Success";
    }
}
