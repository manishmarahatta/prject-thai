<?php 
class FaqManagement extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		Session::flash('pageTitlte', 'FAQ Management');
		Session::flash('pageCat', 'faqManagement');
	}

	public function index(){
		$data['faq']			=	Faq::orderBy('id','asc')->get();
		$this->layout->content 	=	View::make('dashboard.faq.index',$data);
	}

	public function newFaq(){
		$this->layout->content 	=	View::make('dashboard.faq.new');
	}

	public function saveFaq(){
		$id 		=	base64_decode(Input::get('id'));
		
		$validator 	=	array(
						'question'		=>	'required',
						'answer'	=>	'required');
		$validator 	=	Validator::make(Input::all(),$validator);

		if($validator->fails()){
			if(strlen($id)>0){return Redirect::route('faq_management')->withErrors($validator->messages())->withInput();  }
			else{ return Redirect::route('new_faq')->withErrors($validator->messages())->withInput(); }
		}
		else{
			$faq 	=	new Faq();

		    	if(strlen($id)>0){
			    	$faq 		= 	Faq::find($id);
			    	$msg 		= 	'FAQ updated successfully !';
		    	}
		    	else{ $msg 		=	"FAQ inserted successfully!"; }

			$faq->question 		=	Input::get('question');
			$faq->ans 	=	Input::get('answer');
			$faq->save();

			Session::flash('success-message', $msg);
			return Redirect::route('faq_management');
		}
	}

	public function editFaq(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		if($validator->fails()){
			return Redirect::route('faq_management')->withErrors($validator->messages());
		}
		else{
			$data['faq']	=	Faq::where('id',$id)->first();
			$this->layout->content = View::make('dashboard.faq.edit',$data);
		}
	}

	public function deleteFaq(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('faq_management')->withErrors($validator->messages());
		}
		else{
			Faq::where('id','=',$id)->delete();
			
			$msg = "FAQ deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('faq_management');
		}
	}
}