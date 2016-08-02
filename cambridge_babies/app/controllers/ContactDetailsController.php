<?php 
class ContactDetailsController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function index(){
		Session::flash('pageCat', 'contactDetails');
		$data['contact']			=	Contacts::where('id',1)->first();

		$this->layout->content 	=	View::make('dashboard.contacts.index',$data);
	}

	public function updateContact(){
		$id 		=	base64_decode(Input::get('id'));
	
	    	$contact 	= 	Contacts::find($id);
	    	$msg 		= 	'Contact updated successfully !';

		$contact->location 	=	Input::get('address');
		$contact->phone 		=	Input::get('phone');
		$contact->email 		=	Input::get('email');
		$contact->gmap 		=	Input::get('gmap');
		$contact->skype 		=	Input::get('skype');
		$contact->facebook 	=	Input::get('facebook');
		$contact->twitter 		=	Input::get('twitter');
		$contact->save();

			Session::flash('success-message', $msg);
			return Redirect::route('contactDetails');
	}
}