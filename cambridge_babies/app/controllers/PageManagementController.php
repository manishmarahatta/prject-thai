<?php 
class PageManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageTitlte', 'Page Management');
		Session::flash('pageCat', 'pageManagement');
		parent::__construct();
	}

	public function index(){
		Session::flash('pageSubCat', 'pageManagement');

		$data['pages']		=	Pages::orderBy('id','asc')->get();
		$this->layout->content = View::make('dashboard.page_mgmt.index',$data);
	}

	public function subpage(){
		Session::flash('pageSubCat', 'subpageManagement');

		$data['subpages']		=	Subpages::with('mainPage')->orderBy('id','asc')->get();
		$this->layout->content = View::make('dashboard.page_mgmt.subpage.index',$data);
	}

	public function newSubpage(){
		Session::flash('pageSubCat', 'subpageManagement');

		$data['pages']		=	Pages::orderBy('id','asc')->get();
		$this->layout->content = View::make('dashboard.page_mgmt.subpage.newSubpage',$data);
	}

	public function editPage(){
		Session::flash('pageSubCat', 'pageManagement');

		$id 			=	Input::get('id');
		$data['page']	=	Pages::where('id',$id)->first();
		
		$this->layout->content = View::make('dashboard.page_mgmt.editPage',$data);
	}

	public function editSubpage(){
		Session::flash('pageSubCat', 'subpageManagement');

		$id 		=	Input::get('id');
		$data['subpage']	=	Subpages::with('mainPage')->where('id',$id)->first();
		$data['pages']		=	Pages::all();
		
		$this->layout->content = View::make('dashboard.page_mgmt.subpage.editSubpage',$data);
	}

	public function savePage(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'title'		=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			return Redirect::route('page_management')->withErrors($validator->messages())->withInput();
		}
		else{

		    	$page 		= 	Pages::find($id);
		    	$currentImage	=	$page->image;
		    	$msg 		= 	'Page updated successfully !';

			$page->title 		=	Input::get('title');
			$page->description 	=	Input::get('description');
			
			if(Input::file('image')) {
			            $file 			= 	Input::file('image'); 
			            $destinationPath 	= 	"files/pages";
			            $extension 		=	$file->getClientOriginalExtension(); 
			            $imageFilename 	= 	str_random(12).".".$extension;
			            $uploadSuccess 	= 	Input::file('image')->move($destinationPath, $imageFilename);
		   	}

		    	if(isset($uploadSuccess)){
		    		$page->image 		=	str_replace("\\", '/', $uploadSuccess);
		    		@unlink($currentImage);
		   	}

			$page->save();

			Session::flash('success-message', $msg);
			return Redirect::route('page_management');
		}
	}
	public function saveSubpage(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'pageId'	=>	'required',
						'title'		=>	'required',
						'description'	=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){
				return Redirect::route('subpage_management')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_subpage')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$page 	=	new Subpages();
			if(@strlen($id)>0){
			    	$page 		= 	Subpages::find($id);
			    	$currentImage	=	$page->image;
			    	$msg 		= 	'Page updated successfully !';
			 }
			else{ $msg 		=	"Page inserted successfully!"; }
			$page->pageId 	=	Input::get('pageId');
			$page->title 		=	Input::get('title');
			$page->description 	=	Input::get('description');
			
			if(Input::file('image')) {
			            $file 			= 	Input::file('image'); 
			            $destinationPath 	= 	"files/subpages";
			            $extension 		=	$file->getClientOriginalExtension(); 
			            $imageFilename 	= 	str_random(12).".".$extension;
			            $uploadSuccess 	= 	Input::file('image')->move($destinationPath, $imageFilename);
		   	}

		    	if(isset($uploadSuccess)){
		    		$page->image 		=	str_replace("\\", '/', $uploadSuccess);
		    		@unlink($currentImage);
		   	}

			$page->save();

			Session::flash('success-message', $msg);
			return Redirect::route('subpage_management');
		}
	}

	public function deleteSubpage(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('subpage_management')->withErrors($validator->messages());
		}
		else{
			$staff 		= 	Subpages::find($id);
			$currentImage	=	$staff->image;

			Subpages::where('id','=',$id)->delete();
			@unlink($currentImage);
			
			$msg = "Page deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('subpage_management');
		}
	}
}