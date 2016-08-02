<?php 
class TrekkingManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageTitlte', 'Trekking/Activites Management');
		Session::flash('pageCat', 'trekkingManagement');
	}

	public function index(){
		Session::flash('pageSubCat', 'trekkingManagement');
		
		$this->layout->content 	=	View::make('dashboard.trekking.index');
	}


	public function trekking(){
		Session::flash('pageSubCat', 'trekkingManagement');
		$data['results']				=	Trekking::orderBy('title','asc')->get();
		$this->layout->content 	=	View::make('dashboard.trekking.index',$data);
	}

	public function newTrekking(){
		Session::flash('pageSubCat', 'trekkingManagement');

		$data['results']				=	Activities::orderBy('title','asc')->get();
		$this->layout->content 	=	View::make('dashboard.trekking.new',$data);
	}

	public function saveTrekking(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'activitiesId'	=>	'required',
						'title'			=>	'required',
						'description'	=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){return Redirect::route('trekking')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_trekking')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$result 	=	new Trekking();

		    	if(strlen($id)>0){
			    	$result 		= 	Trekking::find($id);
			    	$msg 		= 	'Trekking updated successfully !';
		    	}
		    	else{ $msg 		=	"Trekking inserted successfully!"; }

			$result->title 		=	Input::get('title');
			$result->overview =	Input::get('description');
			$result->itinerary	=	Input::get('itinerary');
			$result->cost_include 	=	Input::get('costDetails');
			$result->duration 	=	Input::get('duration');
			$result->destination 	=	Input::get('destination');
			$result->activities_type 	=	Input::get('activitiesId');
			$result->favourable_seasons 	=	Input::get('favourable_seasons');
			$result->start_end =	Input::get('start_end');
			$result->cost 		=	Input::get('cost');
			$result->save();

			Session::flash('success-message', $msg);
			return Redirect::route('trekking');
		}
	}

	public function editTrekking(){
		(strlen(Input::get('id'))>0) ? $id = Input::get('id') : $id =	 Session::get('id'); 		

		// $validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		// if($validator->fails()){
		// 	return Redirect::route('trekking')->withErrors($validator->messages());
		// }
		// else{
			$data['activities']			=	Activities::orderBy('title','asc')->get();
			$data['albumImages']		=	TrekkingSliders::where('trekking_id','=',$id)->orderBy('id','asc')->get();
			$data['result']	=	Trekking::with('activitiesType')->where('id',$id)->first();
			$this->layout->content = View::make('dashboard.trekking.edit',$data);
		// }
	}

	public function deleteTrekkingSlider(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('trekking')->withErrors($validator->messages());
		}
		else{
			$image 		= 	TrekkingSliders::find($id);
			$currentImage	=	$image->image;

			TrekkingSliders::where('id','=',$id)->delete();
			@unlink($currentImage);
			
			$msg = "Image deleted successfully !";
			Session::put('id',Input::get('trekkingId')); 		
			Session::flash('success-message', $msg);
			return Redirect::route('edit_trekking');
		}
	}

	public function deleteTrekking(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('trekking')->withErrors($validator->messages());
		}
		else{
			Trekking::where('id','=',$id)->delete();

			$trekkingSlider 	=	TrekkingSliders::where('trekking_id','=',Input::get('id'))->get();
			foreach ($trekkingSlider as $row) {
				TrekkingSliders::where('id','=',$row->id)->delete();
				$currentImage	=	$row->image;
				@unlink($currentImage);
			}
			
			$msg = "Trekking deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('trekking');
		}
	}

	public function saveTrekkingSlider(){
		$id 	=	Input::get('id');
		$validator	=	array( 'id'	=>	'required');
		$validator	=	Validator::make(Input::all(),$validator);
		if($validator->fails()){
			return Redirect::route('trekking')->withErrors($validator->messages());
		}
		else{
			$files = Input::file('images');
			$file_count = count($files);
			
			$path =	'files/trekking';
			
			$uploadedArray = array();
			$uploadcount = 0;
			foreach($files as $file) {
				$rules = array('file' => 'required'); 
				$validator = Validator::make(array('file'=> $file), $rules);
				
				if($validator->passes()){
					$destinationPath = $path;
					$filename = str_random(12).'_'.$file->getClientOriginalName();
					$upload_success = $file->move($destinationPath, $filename);
					$uploadedArray[$uploadcount] = $upload_success;
					$uploadcount ++;
				}
			}
					
			if($uploadcount == $file_count){
				for($i = 0; $i<$file_count; $i++){
					$image =  new TrekkingSliders;
					$image->trekking_id = $id;
					$image->image 	=	$uploadedArray[$i];

					$image->save();
				}

				Session::flash('success-message', 'Images added successfully'); 
				Session::put('id',$id); 		
				return Redirect::route('edit_trekking');
			} 
			else {
				 return Redirect::route('trekking')->withInput()->withErrors($validator);
			}
		}
	}


	public function activities(){
		Session::flash('pageSubCat', 'activitiesManagement');
		$data['results']				=	Activities::orderBy('title','asc')->get();
		$this->layout->content 	=	View::make('dashboard.trekking.activities.index',$data);
	}

	public function newActivities(){
		$this->layout->content 	=	View::make('dashboard.trekking.activities.new');
	}

	public function saveActivitiesType(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'name'		=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){return Redirect::route('')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_activities')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$result 	=	new Activities();

		    	if(strlen($id)>0){
			    	$result 		= 	Activities::find($id);
			    	$msg 		= 	'Activities type updated successfully !';
		    	}
		    	else{ $msg 		=	"Activities type inserted successfully!"; }

			$result->title 		=	Input::get('name');
			$result->save();

			Session::flash('success-message', $msg);
			return Redirect::route('activities_type_management');
		}
	}

	public function editActivitiesType(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		if($validator->fails()){
			return Redirect::route('activities_type_management')->withErrors($validator->messages());
		}
		else{
			$data['result']	=	Activities::where('id',$id)->first();
			$this->layout->content = View::make('dashboard.trekking.activities.edit',$data);
		}
	}

	public function deleteActivitiesType(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('activities_type_management')->withErrors($validator->messages());
		}
		else{
			Activities::where('id','=',$id)->delete();
			
			$msg = "Activitie type deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('activities_type_management');
		}
	}
}