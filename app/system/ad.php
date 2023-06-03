<?php

class Ad {
	
	public static function display()
	{
		$ads = config::ads();

		return $ads[array_rand($ads)];
	}

	public static function listAd() {
		 
	}
}
?>