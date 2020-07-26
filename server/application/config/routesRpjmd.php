<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['login'] = 'data/LoginController/login';
$route['cek-login'] = 'data/LoginController/cekLogin';

$route['userlevel/user/page-(:num)'] = 'userlevel/UserController/getData/$1';
$route['userlevel/user/create'] = 'userlevel/UserController/action/create';
$route['userlevel/user/update'] = 'userlevel/UserController/action/update';
$route['userlevel/user/delete/(:num)'] = 'userlevel/UserController/action/delete/$1';


// rpjmd

$route['rpjmd/visi/page-(:num)'] = 'rpjmd/VisiController/getData/$1';
$route['rpjmd/visi/update'] = 'rpjmd/VisiController/action/update';

$route['rpjmd/visi-penjelasan/page-(:num)'] = 'rpjmd/VisiPenjelasanController/getData/$1';
$route['rpjmd/visi-penjelasan/create'] = 'rpjmd/VisiPenjelasanController/action/create';
$route['rpjmd/visi-penjelasan/update'] = 'rpjmd/VisiPenjelasanController/action/update';
$route['rpjmd/visi-penjelasan/delete/(:num)'] = 'rpjmd/VisiPenjelasanController/action/delete/$1';

$route['rpjmd/misi/page-(:num)'] = 'rpjmd/MisiController/getData/$1';
$route['rpjmd/misi/create'] = 'rpjmd/MisiController/action/create';
$route['rpjmd/misi/update'] = 'rpjmd/MisiController/action/update';
$route['rpjmd/misi/delete/(:num)'] = 'rpjmd/MisiController/action/delete/$1';

$route['rpjmd/tujuan/page-(:num)'] = 'rpjmd/TujuanController/getData/$1';
$route['rpjmd/tujuan/create'] = 'rpjmd/TujuanController/action/create';
$route['rpjmd/tujuan/update'] = 'rpjmd/TujuanController/action/update';
$route['rpjmd/tujuan/delete/(:any)'] = 'rpjmd/TujuanController/action/delete/$1';

$route['rpjmd/sasaran/page-(:num)'] = 'rpjmd/SasaranController/getData/$1';
$route['rpjmd/sasaran/create'] = 'rpjmd/SasaranController/action/create';
$route['rpjmd/sasaran/update'] = 'rpjmd/SasaranController/action/update';
$route['rpjmd/sasaran/delete/(:num)'] = 'rpjmd/SasaranController/action/delete/$1';

$route['rpjmd/get-data/misi'] = 'rpjmd/DataController/action/getMisi';

// . rpjmd

//start referensi
$route['referensi/user/page-(:num)'] = 'referensi/KecamatanController/getData/$1';


$route['map/user'] = 'map/Map/map';

$route['referensi/user/provinsi'] = 'referensi/KecamatanController/getDataWhere';
$route['referensi/user/kabupaten/(:num)'] = 'referensi/KecamatanController/getDataWhere/$1';

$route['referensi/user/create'] = 'referensi/KecamatanController/action/create';
$route['referensi/user/update/(:num)'] = 'referensi/KecamatanController/action/update/$1';
$route['referensi/user/delete/(:num)'] = 'referensi/KecamatanController/action/delete/$1';
//end referensi

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
