<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

/*********  ROUTES FOR AUTH.  *********/
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';
$route['auth/register'] = 'auth/register';

/*********  ROUTES FOR ADMIN  *********/
$route['admin'] = 'admins/index';
$route['admin/evaluate/(:any)'] = 'evaluations/index/$1';
$route['admin/report'] = 'report/index';


/*********  ROUTES FOR USERS  *********/
$route['users/ideas/new'] = 'ideas/create';
$route['users/ideas/search'] = 'ideas/search';
$route['users/ideas/edit/(:any)'] = 'ideas/edit/$1';
$route['users/ideas/(:any)'] = 'ideas/view/$1';
$route['users/ideas'] = 'ideas/index';



//inputs for barcode scanners.
$route['scans/new/(:any)'] = 'scans/create/$1';

$route['scans/type'] = 'scans/type';

$route['scans/location'] = 'scans/location';

//inputs for keyboard.
$route['keyboards/new/(:any)/(:any)'] = 'keyboards/create/$1/$2';

$route['keyboards/type'] = 'keyboards/type';

$route['keyboards/location/(:any)'] = 'keyboards/location/$1';


//reports.
$route['reports'] = 'reports/index';


//View tempus
$route['reports/tempus'] = 'reports/tempus';
$route['reports/tempus/import']['post'] = 'reports/tempus_import';





//records.
//this is for editing records.
$route['records'] = 'records/index';
$route['records/edit/(:any)'] = 'records/edit/$1';
$route['records/delete/(:any)'] = 'records/delete/$1';

//users
$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/profile'] = 'users/profile';
$route['users/logout'] = 'users/logout';
$route['users/index'] = 'useraccounts/index';
$route['users/(:any)'] = 'useraccounts/view/$1';



//pages
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
