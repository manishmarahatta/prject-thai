<?php 
class SliderManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageTitlte', 'Slider Management');
		Session::flash('pageCat', 'sliderManagement');
	}

	public function index(){
		$data['sliders']		=	Sliders::orderBy('id','desc')->get();
		$this->layout->content = View::make('dashboard.slider.index',$data);
	}

	public function newSlider(){
		$this->layout->content = View::make('dashboard.slider.newSlider');
	}

	public function saveSlider(){
		$rules = array(
			'image'	=>	'required'
			);
		$validator	=	Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::route('new_slider')->withErrors($validator);
		}
		else{
			$id 		=	base64_decode(Input::get('id'));
			
			$slider 	=	new Sliders();
		    	if(strlen($id)>0){
			    	$slider 		= 	Sliders::find($id);
			    	$currentImage	=	$slider->image;
			    	$msg 		= 	'Slider updated successfully !';
		    	}
			else{ $msg 		=	"Slider inserted successfully!"; }

			// $slider->title 		=	Input::get('title');
			// $slider->caption 	=	Input::get('caption');
				
			if(Input::file('image')) {
			            $file 			= 	Input::file('image'); 
			            $destinationPath 	= 	"files/sliders";
			            $extension 		=	$file->getClientOriginalExtension(); 
			            $imageFilename 	= 	str_random(12).".".$extension;
			            $uploadSuccess 	= 	Input::file('image')->move($destinationPath, $imageFilename);
		   	}
		    	if(isset($uploadSuccess)){
		    		$slider->image 		=	str_replace("\\", '/', $uploadSuccess);
		    		@unlink($currentImage);
		   	}
			$slider->save();

			Session::flash('success-message', $msg);
			return Redirect::route('slider_management');
		}
	}

	public function editSlider(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		if($validator->fails()){
			return Redirect::route('slider_management')->withErrors($validator->messages());
		}
		else{
			$data['slider']	=	Sliders::where('id',$id)->first();
			$this->layout->content = View::make('dashboard.slider.editSlider',$data);
		}
	}

	public function deleteSlider(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('slider_management')->withErrors($validator->messages());
		}
		else{
			$slider 		= 	Sliders::find($id);
			$currentImage	=	$slider->image;

			Sliders::where('id','=',$id)->delete();
			@unlink($currentImage);
			
			$msg = "Slider deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('slider_management');
		}
	}
}