<?php 
class AdminController extends Controller {
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function __construct(){
		$userInfo = User::find(1);
		Session::put('userName', $userInfo->name);
		Session::put('userCreated',date( 'M. Y', strtotime($userInfo->created_at)));
		Session::put('userProfile', $userInfo->profile);
		if(!Auth::check()):
			Redirect::to('/_cpanel')->send();
		endif;
	}

}