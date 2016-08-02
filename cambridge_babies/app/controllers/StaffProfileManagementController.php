<?php 
class StaffProfileManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageCat', 'staffProfileManagement');
	}

	public function index(){
		$data['staff']		=	Staffs::orderBy('id','asc')->get();
		$this->layout->content = View::make('dashboard.staffProfileManagement.index',$data);
	}

	public function newProfile(){
		$this->layout->content = View::make('dashboard.staffProfileManagement.newProfile');
	}

	public function saveProfile(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'name'			=>	'required');
		if(!isset($id)){  $validator['image'] = 'required'; }
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){
				return Redirect::route('staff_profile')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_profile')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$staff 	=	new Staffs();

		    	if(strlen($id)>0){
			    	$staff 		= 	Staffs::find($id);
			    	$currentImage	=	$staff->image;
			    	$msg 		= 	'Profile updated successfully !';
		    	}
		    	else{ $msg 		=	"Profile inserted successfully!"; }

			$staff->name 			=	Input::get('name');
			$staff->designation 	=	Input::get('designation');
			$staff->description 	=	Input::get('description');
			
			if(Input::file('image')) {
			            $file 			= 	Input::file('image'); 
			            $destinationPath 	= 	"files/staff";
			            $extension 		=	$file->getClientOriginalExtension(); 
			            $imageFilename 	= 	str_random(12).".".$extension;
			            $uploadSuccess 	= 	Input::file('image')->move($destinationPath, $imageFilename);
		   	}

		    	if(isset($uploadSuccess)){
		    		$staff->image 		=	str_replace("\\", '/', $uploadSuccess);
		    		@unlink($currentImage);
		   	}

			$staff->save();

			Session::flash('success-message', $msg);
			return Redirect::route('staff_profile');
		}
	}

	public function editProfile(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		if($validator->fails()){
			return Redirect::route('staff_profile')->withErrors($validator->messages());
		}
		else{
			$data['profile']	=	Staffs::where('id',$id)->first();
			$this->layout->content = View::make('dashboard.staffProfileManagement.editProfile',$data);
		}
	}

	public function deleteProfile(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('staff_profile')->withErrors($validator->messages());
		}
		else{
			$staff 		= 	Staffs::find($id);
			$currentImage	=	$staff->image;

			Staffs::where('id','=',$id)->delete();
			@unlink($currentImage);
			
			$msg = "Profile deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('staff_profile');
		}
	}
}