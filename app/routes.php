<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

route::get('/', 'MusicController::index');
route::get('/(:name)', 'MusicController::byCategory');
route::get('/(:name)/(:name)', 'MusicController::albumDetail');

route::get('/company/', 'CompanyController::home');
route::get('/company/(:any)', 'CompanyController::detail');


?>