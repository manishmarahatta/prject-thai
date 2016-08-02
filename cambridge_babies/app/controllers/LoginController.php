<?php
class LoginController extends BaseController {
	public function showLogin(){
		if(!Auth::check()):
			return View::make('login.index');
		else:
			return Redirect::route('dashboard');
		endif;
	}

	public function doLogin(){
		$rules = array(
			'username'	=>	'required',
			'password'	=>	'required|min:3'
			);
		$validator	=	Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('/_cpanel')
					->withErrors($validator)
					->withInput(Input::except('password'));
		}
		else{
			$userdata = array(
				'username'	=>	Input::get('username'),
				'password'	=>	Input::get('password')
			);

			if(Auth::attempt($userdata)) {
				return Redirect::intended('dashboard');
			}
			else{
				$error_msg = "Wrong combination of username & password.";
				Session::flash('error-message', $error_msg);
				return Redirect::route('login')->withInput(Input::except('password'));
			}
		}
	}
}
