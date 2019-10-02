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
//case insensitive routing example
//$route['(?i)companyname'] = "/profile/1";

//custom admin routes
$route['admin/add-pancit'] = '../Admin/AddPancit';
$route['Admin/AddPancit'] = '../Admin/AddPancit';
//$route['Admin'] = '../Admin/Login';
$route['(?i)admin'] = '../Admin/Login';
$route['Admin/Logout'] = '../Admin/Logout';
$route['Admin/(:any)'] = '../Admin/$1';
$route['admin/(:any)'] = '../Admin/$1';
$route['Admin/Dashboard'] = '../Admin/Dashboard';
//$route['(?i)admin/edit/(:num)'] = '../Dashboard/EditPancit';
$route['(?i)admin/edit/(:num)'] = '../Admin/Dashboard/edit_pancit/$1';

//user routes
$route['(?i)register'] = 'User/register';
$route['(?i)register/(:any)'] = 'User/register/$1';
$route['(?i)login/(:any)'] = 'User/login/$1';
$route['(?i)login'] = 'User/login';


//custom view routes
$route['pview/(:any)'] = 'Pancit/pview/$1';
//$route['pview/:num'] = 'Pancit/pview/$1';

//$route['Pancit/(:any)'] = 'Pancit/$1';


$route['default_controller'] = 'Pancit';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
