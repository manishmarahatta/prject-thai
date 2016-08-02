<?php
class Pages extends Eloquent{

	public function subpages(){
		return $this->hasMany('Subpages','pageId');
	}
}

