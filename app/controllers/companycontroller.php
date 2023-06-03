<?php

class CompanyController {

	public static function getByCompanyID($companyID) {
		if (!$company = db::find('companies', $companyID))
			return app::abort(404);

		$q = db::query("SELECT * FROM companies WHERE DATE(reg_date) = '{$company['reg_date']}' LIMIT 10");
		$related = $q->fetchAll();

		$q = db::query("SELECT * FROM companies WHERE id > '{$company['id']}' ORDER BY id LIMIT 10");
		$nare = $q->fetchAll();

		$company['reg_date'] = strtotime($company['reg_date']);

		return view::make('company', [
			'title' 	=>	str::title($company['name']) .' - Phone Number, Address, Email',
			'company'	=>	$company,
			'related'	=>	$related,
			'nare'		=>	$nare
		]);
	}

}

?>