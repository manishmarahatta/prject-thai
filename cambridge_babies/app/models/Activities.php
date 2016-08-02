<?php
class Activities extends Eloquent{

	public function cambridgebabies(){
		return $this->hasMany('Trekking','activities_type','id');
	}	
}

