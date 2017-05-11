<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class UserController extends Controller
{
    public function registerDoctor(Request $request){

    	$username=$request->username;
    	$password=$request->password;
    	$npassword=password_hash($password,PASSWORD_DEFAULT);
    	$name=$request->password;
    	$gender=$request->gender;
    	$specialist=$request->specialist;
    	$mci_reg_num=$request->mci_reg_num;
    	$hospital_name=$request->hospital_name;
    	$address=$request->address;
    	$pincode=$request->pincode;
    	$phone=$request->phone;
    	$email=$request->email;
    	$website=$request->website;
    	if($request->amount){
    		$amount=$request->amount; 
    		$free="1";
    	} 
    	else {
    		$amount="";
    		$free="0"; 
    	}
    	$profile_pic=$request->file('profile_pic');
    	//File upload section
    	$destinationPath='DoctorImages';
    	$fileName=$profile_pic->getClientOriginalName();
    	$fileExtension=$profile_pic->getClientOriginalExtension();

    	$check_mci_num=DB::table('doctors')->where('mci_reg_num',$mci_reg_num)->first();
    	$emailcheck=DB::table('doctors')->where('email',$email)->first();
    	if($emailcheck!="") return redirect('/doctor/signup')->with('status','1');
    	$unamecheck=DB::table('doctors')->where('username',$username)->first();
    	if($unamecheck!="") return redirect('/doctor/signup')->with('status','1');
    	if($check_mci_num!=""){
		    	if($check_mci_num->mci_reg_num == $mci_reg_num){
		    		return redirect('/doctor/signup')->with('status','1');
		    		return ['result'=>"Already Registered"];
		        }
		        elseif($check_mci_num->email == $email){
		        	return redirect('/doctor/signup')->with('status','1');
		        	return ['result'=>"Already Registered"];
		        }
		        elseif($check_mci_num->username == $username){
		        	return redirect('/doctor/signup')->with('status','1');
		        	return ['result'=>"Already Registered"];
		        }
		        else{

		         $id=DB::table('doctors')->insertGetId(['username'=>$username,'password'=>$npassword,'name'=>$name,'gender'=>$gender,'specialist'=>$specialist,'mci_reg_num'=>$mci_reg_num,'hospital_name'=>$hospital_name,'address'=>$address,'pincode'=>$pincode,'phone'=>$phone,'email'=>$email,'website'=>$website,'profile_pic'=>$fileName,'free'=>$free,'amount'=>$amount]);
		    	 $imageName=$id.'.'.$fileExtension;

		    	 $profile_pic->move($destinationPath,$imageName);

		    	 $updateTable=DB::table('doctors')->where('id',$id)->update(['profile_pic'=>$imageName]);

			    	if($updateTable) return ['result'=>"Register Successfull"];
			    	else return redirect('/doctor/signup')->with('status','2');
		        }
    }
    else{
         $id=DB::table('doctors')->insertGetId(['username'=>$username,'password'=>$npassword,'name'=>$name,'gender'=>$gender,'specialist'=>$specialist,'mci_reg_num'=>$mci_reg_num,'hospital_name'=>$hospital_name,'address'=>$address,'pincode'=>$pincode,'phone'=>$phone,'email'=>$email,'website'=>$website,'profile_pic'=>$fileName,'free'=>$free,'amount'=>$amount]);
    	 $imageName=$id.'.'.$fileExtension;

    	 $profile_pic->move($destinationPath,$imageName);

    	 $updateTable=DB::table('doctors')->where('id',$id)->update(['profile_pic'=>$imageName]);

	    	if($updateTable) return ['result'=>"Register Successfull"];
	    	else return redirect('/doctor/signup')->with('status','2');
    }


       // return $json=DB::table('users')->where('id',1)->get();
       // return $json->email;
       // return $obj=json_decode($json,true);
       // return $email=$obj[0]['email'];
    }

    public function registerUser(Request $request){
    	//Request from UI page
    	$name=$request->name;
    	$email=$request->email;
    	$password=$request->password;
        $npassword=password_hash($password,PASSWORD_DEFAULT);

    	$gender=$request->gender;
    	$profile_pic=$request->file('profile_pic');
    	//File upload section
    	$destinationPath='UserImages';
    	$fileName=$profile_pic->getClientOriginalName();
    	$fileExtension=$profile_pic->getClientOriginalExtension();

    	$userCheck=DB::table('users')->where('email',$email)->first();
    	if($userCheck ==""){

    	 $id=DB::table('users')->insertGetId(['name'=>$name,'email'=>$email,'password'=>$npassword,'gender'=>$gender,'profile_pic'=>$fileName]);
    	 $imageName=$id.'.'.$fileExtension;

    	 $profile_pic->move($destinationPath,$imageName);

    	 $updateTable=DB::table('users')->where('id',$id)->update(['profile_pic'=>$imageName]);

    	 if($updateTable){
    	 	$request->session()->put('user', $email);
    		return redirect('user/dashboard');
    	 	//return ['result'=>"Register Successfull"];
    	 }
    	}
    	else{

    		return redirect('/user/signup')->with('status','1');
    	}
    }
    public function loginUser(Request $request){
    	$email=$request->email;
    	$password=$request->password;
    	$user=DB::table('users')->where('email',$email)->first();
    	if($user){
    		$pass=$user->password;
    		if(password_verify($password,$pass)){
    			$request->session()->put('user', $email);
    			$request->session()->put('userid', $user->id);
    			return redirect('user/dashboard');
    			//return ['result'=>"Login Success"];
    		}
    		else{
    			return redirect('/user/login')->with('status','2');
    			//return ['result'=>"Wrong password"];
    		}
    	}
    	else{
    		return redirect('/user/login')->with('status','1');
    		//return ['result'=>"Wrong email"];
    	}

    }
    public function loginDoctor(Request $request){
    	$username=$request->username;
    	$password=$request->password;
    	$user=DB::table('doctors')->where('username',$username)->first();
    	if($user){
    		$pass=$user->password;
    		if(password_verify($password,$pass)){
    			$request->session()->put('doctor', $username);
                $request->session()->put('doctorid', $user->{'id'});
    			return redirect('/doctor/dashboard');
    			//return ['result'=>"Login Success"];
    		}
    		else{
    			return redirect('/doctor/login')->with('status','2');
    			//return ['result'=>"Wrong password"];
    		}

    	}
    	else{
    		return redirect('/doctor/login')->with('status','1');
    		//return ['result'=>"Wrong username"];
    	}
    }
    public function registerMedical(Request $request){
    	$username=$request->username;
    	$password=$request->password;
    	$npassword=password_hash($password,PASSWORD_DEFAULT);
    	$shop_name=$request->shop_name;
    	$address=$request->address;
    	$pincode=$request->pincode;
    	$phone=$request->phone;
    	$email=$request->email;
    	$website=$request->website;
    	$profile_pic=$request->file('profile_pic');
    	//File upload section
    	$destinationPath='ShopLogos';
    	$fileName=$profile_pic->getClientOriginalName();
    	$fileExtension=$profile_pic->getClientOriginalExtension();

    	$emailcheck=DB::table('medical_shop')->where('email',$email)->first();

    	$medicalCheck=DB::table('medical_shop')->where('username',$username)->first();
    	if($medicalCheck ==""){

	    	 $id=DB::table('medical_shop')->insertGetId(['username'=>$username,'password'=>$npassword,'shopname'=>$shop_name,'address'=>$address,'pincode'=>$pincode,'phone'=>$phone,'email'=>$email,'website'=>$website,'shop_logo'=>$fileName]);
	    	 $imageName=$id.'.'.$fileExtension;

	    	 $profile_pic->move($destinationPath,$imageName);

	    	 $updateTable=DB::table('medical_shop')->where('id',$id)->update(['shop_logo'=>$imageName]);

	    	 if($updateTable){
	    	 	$request->session()->put('medical', $username);
	    	 	return redirect('/medicalshop/dashboard');
	    	 	//return ['result'=>"Register Successfull"];
	    	 }
    	}
    	else{
    		return redirect('/medicalshop/signup')->with('status','1');
    		return ['result'=>"Exist User"];
    	}

    }
    public function loginMedical(Request $request){
    	$username=$request->username;
    	$password=$request->password;
    	$user=DB::table('medical_shop')->where('username',$username)->first();
    	if($user){
    		$pass=$user->password;
    		if(password_verify($password,$pass)){
    			$request->session()->put('medical', $username);
    			$request->session()->put('shopid',$user->id);
    			return redirect('/medicalshop/dashboard');
    			//return ['result'=>"Login Success"];
    		}
    		else{
    			return redirect('/medicalshop/login')->with('status','2');
    		}

    	}
    	else{
    		return redirect('/medicalshop/login')->with('status','1');
    		//return ['result'=>"Wrong username"];
    	}
    }
    public function medical_shop_search_result(Request $request){
    	$word=$request->search;
    	if(ctype_digit($word)){
    		$length=strlen($word);
    		if($length==6){
    			$pincode=$word;
    			$result=DB::table('medical_shop')->where('pincode',$pincode)->get();
    			$decode=json_decode($result,true);
    			if($decode==[]) return view('user.medical_shop_search')->with('flag','2');
    			else return view('user.medical_shop_search')->with('flag','0')->with('users',$decode);
    		}
    	}
    	else{
    		$result=DB::table('medical_shop')->where('shopname','like',"%$word%")->get();
			$decode=json_decode($result,true);
    		if($decode==[]) return view('user.medical_shop_search')->with('flag','2');
    		else return view('user.medical_shop_search')->with('flag','0')->with('users',$decode);
    	}
    }
    public function order_medical(Request $request,$id){
    	if ($request->session()->has('user')) {
    		return view('user.order_medical')->with('shopid',$id);
    	}
    	else return redirect('/');
    }
    public function medicine_order(Request $request){
    	if ($request->session()->has('user')) {
    		$userid=$request->session()->get('userid');
    		$address=$request->address;
    		$shopid=$request->shopid;
    		$phone=$request->phone;
    		$delivery_type=$request->delivery_type;
    		$date=date("Y/m/d");
    		$destinationPath="PrescriptionImages";
    		if($request->file('prescription_image')){
    				$fileName=$request->file('prescription_image')->getClientOriginalName();
    				$fileExtension=$request->file('prescription_image')->getClientOriginalExtension();
    				$id=DB::table('orders')->insertGetId(['userid'=>$userid,'address'=>$address,'phone'=>$phone,'delivery_type'=>$delivery_type,'shopid'=>$shopid,'prescription_image'=>$fileName,'medicine'=>"",'date'=>$date,'status'=>""]);
    				 $imageName=$id.'.'.$fileExtension;

	    	 		 $request->file('prescription_image')->move($destinationPath,$imageName);
	    	 		 $updateTable=DB::table('orders')->where('id',$id)->update(['prescription_image'=>$imageName]);
	    	 		 if($updateTable){
	    	 		 	return redirect('/user/order_medical/'.$shopid)->with('status','2')->with('deliveryid',$id);
	    	 		 }
	    	 		 else{
	    	 		 	return redirect('/user/order_medical/'.$shopid)->with('status','1');
	    	 		 }
    		}
    		else{
    			$prescription_image="";
    			$prescription=$request->prescription;
				$id=DB::table('orders')->insertGetId(['userid'=>$userid,'address'=>$address,'phone'=>$phone,'delivery_type'=>$delivery_type,'shopid'=>$shopid,'prescription_image'=>$prescription_image,'medicine'=>$prescription,'date'=>$date,'status'=>""]);
				return redirect('/user/order_medical/'.$shopid)->with('status','2')->with('deliveryid',$id);
    		}

    	}
    	else return redirect('/');
    }
    public function deliverorder(Request $request,$id){
    	$result=DB::table('orders')->where('id',$id)->update(['status'=>"1"]);
    	return redirect('/medicalshop/dashboard')->with('status','1');
    }
    public function cancelorder(Request $request,$id){
    	$result=DB::table('orders')->where('id',$id)->update(['status'=>"0"]);
    	return redirect('/medicalshop/dashboard')->with('status','2');
    }
    public function doctor_search_results(Request $request){
    	$word=$request->search;
    	$speciality=$request->speciality;
    	if(ctype_digit($word)){
    		$length=strlen($word);
    		if($length=="6"){
    			$result=DB::table('doctors')->where('pincode',$word)->where('specialist',$speciality)->get();
    			$decode=json_decode($result,true);
    			if($decode==[]) return view('user.doctor_search')->with('flag','2');
    			else return view('user.doctor_search')->with('flag','1')->with('users',$decode);
    		}
    	}
    	else{
    		$result=DB::table('doctors')->where('specialist',$speciality)->where('name','like',"%$word%")->get();
    		$decode=json_decode($result,true);
    		if($decode==[]) return view('user.doctor_search')->with('flag','2');
    		else return view('user.doctor_search')->with('flag','1')->with('users',$decode);
    	}
    }
    public function chat_message(Request $request){
   		$userid= $request->userid1;
   		$doctorid=$request->doctorid1;
   		$message=$request->msg2;
   		$date=date("Y/m/d");
   		$time=date("h:i:sa");
   		$sender="user";
   		$insertdata=DB::table('messages')->insert(['userid'=>$userid,'doctorid'=>$doctorid,'message'=>$message,'sender'=>$sender,'date'=>$date,'time'=>$time]);
   		return "Success";

    }
}
