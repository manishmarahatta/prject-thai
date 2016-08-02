<?php 
class NewsUpdatesManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageTitlte', 'News & updates Management');
		Session::flash('pageCat', 'newsupdateManagement');
	}

	public function index(){
		$data['articles']			=	NewsUpdates::orderBy('date','desc')->get();

		$this->layout->content 	=	View::make('dashboard.newsupdates.index',$data);
	}

	public function new_newsupdates(){
		$this->layout->content 	=	View::make('dashboard.newsupdates.newPost');
	}

	public function save_newsupdates(){
		$id 		=	base64_decode(Input::get('id'));
		$validator 	=	array(
						'title'		=>	'required',
						'fulltext'	=>	'required',
						'date'		=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){return Redirect::route('newsupdate_management')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_newsupdates')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$blog 	=	new NewsUpdates();

		    	if(strlen($id)>0){
			    	$blog 		= 	NewsUpdates::find($id);
			    	$msg 		= 	'Article updated successfully !';
		    	}
		    	else{ $msg 		=	"Article inserted successfully!"; }

			$blog->title 		=	Input::get('title');
			$blog->description 	=	Input::get('fulltext');
			$blog->date 		=	strtotime(Input::get('date'));
			$blog->archives 	= 	strtotime(date('Y-m',strtotime(Input::get('date')))."-1");
 			$blog->save();

			Session::flash('success-message', $msg);
			return Redirect::route('newsupdate_management');
		}
	}

	public function editPost(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		if($validator->fails()){
			return Redirect::route('newsupdate_management')->withErrors($validator->messages());
		}
		else{
			$data['row']	=	NewsUpdates::where('id',$id)->first();
			$this->layout->content = View::make('dashboard.newsupdates.edit',$data);
		}
	}

	public function deletePost(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('newsupdate_management')->withErrors($validator->messages());
		}
		else{
			NewsUpdates::where('id','=',$id)->delete();
			
			$msg = "Article deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('newsupdate_management');
		}
	}
}