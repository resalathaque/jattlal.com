<?php

class CompanyController {

	public static function home()
	{

		$q = db::query('SELECT * FROM companies ORDER BY reg_date DESC LIMIT 50');
		$companies = $q->fetchAll();

		return view::make('info.home', [
			'title'			=>	'AllCompany.in - Indian Company and Corporate Directory',
			'companies'		=>	$companies
		]);
	}

	public static function detail($companyID) {
		if (!$company = db::find('companies', $companyID))
			return app::abort(404);

		$q = db::query("SELECT * FROM companies WHERE DATE(reg_date) = '{$company['reg_date']}' LIMIT 10");
		$related = $q->fetchAll();

		$q = db::query("SELECT * FROM companies WHERE id > '{$company['id']}' ORDER BY id LIMIT 10");
		$nare = $q->fetchAll();

		$company['reg_date'] = strtotime($company['reg_date']);

		return view::make('info.company_detail', [
			'title' 	=>	str::title($company['name']) .' - Phone Number, Address, Email',
			'company'	=>	$company,
			'related'	=>	$related,
			'nare'		=>	$nare
		]);
	}
}

?>