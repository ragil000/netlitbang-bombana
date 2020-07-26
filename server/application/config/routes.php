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

$route['login'] = 'login/LoginController/login';
$route['countData'] = 'count/CountController/countAllData';

// Galeri
$route['baubau/galeri/page-(:num)'] = 'galeri/GaleriController/getData/$1';
$route['baubau/galeri/getAllData'] = 'galeri/GaleriController/getAllData';
$route['baubau/galeri/create'] = 'galeri/GaleriController/action/create';
$route['baubau/galeri/update/(:num)'] = 'galeri/GaleriController/action/update/$1';
$route['baubau/galeri/delete/(:num)'] = 'galeri/GaleriController/action/delete/$1';
// end Galeri

// Basemap
$route['baubau/basemap/page-(:num)'] = 'basemap/BasemapController/getData/$1';
$route['baubau/basemap/getAllData'] = 'basemap/BasemapController/getAllData';
$route['baubau/basemap/create'] = 'basemap/BasemapController/action/create';
$route['baubau/basemap/update/(:num)'] = 'basemap/BasemapController/action/update/$1';
$route['baubau/basemap/delete/(:num)'] = 'basemap/BasemapController/action/delete/$1';
// end Basemap

// Baseline
$route['baubau/baseline/page-(:num)'] = 'baseline/BaselineController/getData/$1';
$route['baubau/baseline/getAllData'] = 'baseline/BaselineController/getAllData';
$route['baubau/baseline/create'] = 'baseline/BaselineController/action/create';
$route['baubau/baseline/update/(:num)'] = 'baseline/BaselineController/action/update/$1';
$route['baubau/baseline/delete/(:num)'] = 'baseline/BaselineController/action/delete/$1';
// end Baseline

// Peraturan
$route['baubau/peraturan/page-(:num)'] = 'peraturan/PeraturanController/getData/$1';
$route['baubau/peraturan/create'] = 'peraturan/PeraturanController/action/create';
$route['baubau/peraturan/update/(:num)'] = 'peraturan/PeraturanController/action/update/$1';
$route['baubau/peraturan/delete/(:num)'] = 'peraturan/PeraturanController/action/delete/$1';
// end Peraturan

// Profil Kumuh
$route['baubau/profil-kumuh/page-(:num)'] = 'profil-kumuh/KumuhController/getData/$1';
$route['baubau/profil-kumuh/getAllData'] = 'profil-kumuh/KumuhController/getAllData';
$route['baubau/profil-kumuh/create'] = 'profil-kumuh/KumuhController/action/create';
$route['baubau/profil-kumuh/update/(:num)'] = 'profil-kumuh/KumuhController/action/update/$1';
$route['baubau/profil-kumuh/delete/(:num)'] = 'profil-kumuh/KumuhController/action/delete/$1';
// end Profil Kumuh

// Galeri Peta
$route['baubau/galeri-peta/page-(:num)'] = 'galeri-peta/PetaController/getData/$1';
$route['baubau/galeri-peta/getAllData'] = 'galeri-peta/PetaController/getAllData';
$route['baubau/galeri-peta/create'] = 'galeri-peta/PetaController/action/create';
$route['baubau/galeri-peta/update/(:num)'] = 'galeri-peta/PetaController/action/update/$1';
$route['baubau/galeri-peta/delete/(:num)'] = 'galeri-peta/PetaController/action/delete/$1';
// end Galeri Peta

// Tentang Web
$route['baubau/tentang-web/page-(:num)'] = 'tentang-web/TentangWebController/getData/$1';
$route['baubau/tentang-web/create'] = 'tentang-web/TentangWebController/action/create';
// end Tentang Web

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
