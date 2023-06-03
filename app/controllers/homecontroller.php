<?php

class HomeController
{
	
	public static function getHome()
	{

		$q = db::query('SELECT * FROM companies ORDER BY reg_date DESC LIMIT 50');
		$companies = $q->fetchAll();

		return view::make('home', [
			'title'			=>	'AllCompany.in - Indian Company and Corporate Directory',
			'companies'		=>	$companies
		]);
	}
}

?>