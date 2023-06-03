<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

route::get('/test', function() {
	return db::find('companies', 'U74210AS2012PTC011339');
});


route::get('/', 'HomeController::getHome');
route::get('/company/(:any)', 'CompanyController::getByCompanyID');


?>