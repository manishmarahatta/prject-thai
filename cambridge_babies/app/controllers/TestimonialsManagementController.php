<?php 
class TestimonialsManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageCat', 'testimonialsManagement');
	}

	public function index(){
		$data['testimonials']		=	Testimonials::orderBy('id','asc')->get();
		$this->layout->content = View::make('dashboard.testimonials.index',$data);
	}

	public function newTestimonials(){
		$this->layout->content = View::make('dashboard.testimonials.newTestimonials');
	}

	public function saveTestimonials(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'name'		=>	'required',
						'message'	=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){return Redirect::route('testimonials_management')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_testimonials')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$testimonials 	=	new Testimonials();

		    	if(strlen($id)>0){
			    	$testimonials 		= 	Testimonials::find($id);
			    	$msg 		= 	'Testimonials updated successfully !';
		    	}
		    	else{ $msg 		=	"Testimonials inserted successfully!"; }

			$testimonials->name 		=	Input::get('name');
			$testimonials->designation =	Input::get('designation');
			$testimonials->message 	=	Input::get('message');

			if(Input::file('image')) {
			            $file 			= 	Input::file('image'); 
			            $destinationPath 	= 	"files/testimonials/";
			            $extension 		=	$file->getClientOriginalExtension(); 
			            $imageFilename 	= 	str_random(12).".".$extension;
			            $uploadSuccess 	= 	Input::file('image')->move($destinationPath, $imageFilename);
		   	}

		    	if(isset($uploadSuccess)){
		    		$testimonials->image 		=	str_replace("\\", '/', $uploadSuccess);
		    		@unlink($currentImage);
		   	}

			$testimonials->save();

			Session::flash('success-message', $msg);
			return Redirect::route('testimonials_management');
		}
	}

	public function editTestimonials(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		if($validator->fails()){
			return Redirect::route('testimonials_management')->withErrors($validator->messages());
		}
		else{
			$data['testimonials']	=	Testimonials::where('id',$id)->first();
			$this->layout->content = View::make('dashboard.testimonials.editTestimonials',$data);
		}
	}

	public function deleteTestimonials(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('testimonials_management')->withErrors($validator->messages());
		}
		else{
			Testimonials::where('id','=',$id)->delete();
			
			$msg = "Testimonials deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('testimonials_management');
		}
	}
}