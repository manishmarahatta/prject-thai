<?php 
class BlogManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageTitlte', 'Blog Management');
		Session::flash('pageCat', 'blogManagement');
	}

	public function index(){
		$data['articles']			=	Blog::orderBy('date','desc')->get();

		$this->layout->content 	=	View::make('dashboard.blog.index',$data);
	}

	public function newPost(){
		$this->layout->content 	=	View::make('dashboard.blog.newPost');
	}

	public function savePost(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'title'		=>	'required',
						'fulltext'	=>	'required',
						'date'		=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){return Redirect::route('blog_management')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_blog_post')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$blog 	=	new Blog();

		    	if(strlen($id)>0){
			    	$blog 		= 	Blog::find($id);
			    	$msg 		= 	'Article updated successfully !';
		    	}
		    	else{ $msg 		=	"Article inserted successfully!"; }

			$blog->title 		=	Input::get('title');
			$blog->description 	=	Input::get('fulltext');
			$blog->date 		=	strtotime(Input::get('date'));
			$blog->archives 	= 	strtotime(date('Y-m',strtotime(Input::get('date')))."-1");
 			$blog->save();

			Session::flash('success-message', $msg);
			return Redirect::route('blog_management');
		}
	}

	public function editPost(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		if($validator->fails()){
			return Redirect::route('blog_management')->withErrors($validator->messages());
		}
		else{
			$data['row']	=	Blog::where('id',$id)->first();
			$this->layout->content = View::make('dashboard.blog.edit',$data);
		}
	}

	public function deletePost(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('blog_management')->withErrors($validator->messages());
		}
		else{
			Blog::where('id','=',$id)->delete();
			
			$msg = "Article deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('blog_management');
		}
	}
}