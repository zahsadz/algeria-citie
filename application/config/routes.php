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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['wilaya/(:num)'] = "Welcome/wilaya/$1";
$route['dairas/(:num)'] = "Welcome/dairas/$1";
$route['communes/(:num)'] = "Welcome/communes/$1";
$route['search'] = "Welcome/search";
$route['search/(:num)'] = "Welcome/search/$1";
/**** admin *****/
$route['admin/edit_communes/(:num)'] = 'Admin/edit_communes/$1';
$route['admin/update_communes/(:num)'] = 'Admin/update_communes/$1';
$route['admin/edit_daira/(:num)'] = 'Admin/edit_daira/$1';
$route['admin/update_daira/(:num)'] = 'Admin/update_daira/$1';
$route['admin/edit_willaya/(:num)'] = 'Admin/edit_willaya/$1';
$route['admin/update_willaya/(:num)'] = 'Admin/update_willaya/$1';
$route['admin/create_willaya'] = 'Admin/create_willaya';

$route['registration'] = 'Users/registration';
$route['login'] = 'Users/login';
$route['404_override'] = 'Custom404';
