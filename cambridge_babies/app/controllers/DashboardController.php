<?php 
class DashboardController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function index(){
		Session::flash('pageCat', 'dashboard');
		return Redirect::route('slider_management');
	}

	public function profileMgmt(){
		Session::flash('pageCat', 'profileMgmt');

		$data['profileInfo']			=	User::where('id',1)->first();

		$this->layout->content 	=	View::make('dashboard.profileMgmt.index',$data);
	}

	public function updatePassword(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'oldPassword'	 =>	'required',
						'newPassword'	 =>	'required',
						'retypeNewPassword'	 =>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			return Redirect::route('profile_mgmt')->withErrors($validator->messages())->withInput();
		}
		else{
			if(Input::get('newPassword')==Input::get('retypeNewPassword')){
				$profileInfo 	= User::where('id',$id)->first();

				if(Hash::check(Input::get('oldPassword'), $profileInfo->password)):
					$user =  User::find($id);
					$user->password = Hash::make(Input::get('newPassword'));
					$user->save();
					$msg  = "Password changed successfully !";
					Session::flash('success-message', $msg);
				else:
					$msg 		= 	"Your old password didn't matched !";
					Session::flash('warning-message', $msg);
				endif;
			}
			else{
				$msg 		= 	"Your new password and retyped password didn't matched !";
				Session::flash('warning-message', $msg);
			}
			return Redirect::route('profile_mgmt');
		}
	}

	public function updateProfile(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'username'	=>	'required',
						'name'		=>	'required',
						'email'		=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			return Redirect::route('profile_mgmt')->withErrors($validator->messages())->withInput();
		}
		else{
			if(strlen($id)>0){
			    	$user 		= 	User::find($id);
			    	$currentImage	=	$user->profile;
			    	$msg 		= 	'Profile updated successfully !';

			    	$user->username 		=	Input::get('username');
				$user->name 			=	Input::get('name');
				$user->email 			=	Input::get('email');
				
				if(Input::file('image')) {
				            $file 			= 	Input::file('image'); 
				            $destinationPath 	= 	"files/user";
				            $extension 		=	$file->getClientOriginalExtension(); 
				            $imageFilename 	= 	str_random(12).".".$extension;
				            $uploadSuccess 	= 	Input::file('image')->move($destinationPath, $imageFilename);
			   	}

			    	if(isset($uploadSuccess)){
			    		$user->profile 		=	str_replace("\\", '/', $uploadSuccess);
			    		@unlink($currentImage);
			   	}

				$user->save();
		    	}
		    	
			Session::flash('success-message', $msg);
			return Redirect::route('profile_mgmt');
		}
	}

	public function logout(){
		Auth::logout();
		$msg = 'You have been successfully logged out';
		Session::flash('logout-message', $msg);
		return Redirect::to('_cpanel'); 
	}
}