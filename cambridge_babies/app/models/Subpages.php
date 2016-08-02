<?php
class Subpages extends Eloquent{
	public function mainPage(){
		return $this->belongsTo('Pages','pageId');
	}
}