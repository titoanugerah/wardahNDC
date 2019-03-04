<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'account/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

#ACCOUNT AREA
$route['login'] = 'account/login';
$route['logout'] = 'account/logout';
$route['forgotPassword'] = 'account/forgotPassword';
$route['dashboard'] = 'account/dashboard';
$route['profile'] = 'account/profile';

#ADMIN AREA
$route['webConf'] = 'admin/webConf';
$route['account'] = 'admin/account';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';
$route['deleteAccount/(:any)'] = 'admin/deleteAccount/$1';
$route['itemList'] = 'admin/itemList';
$route['detailItem/(:any)'] = 'admin/detailItem/$1';

#WAREHOUSE AREA
$route['item'] = 'warehouse/item';
$route['detailItem/(:any)'] = 'warehouse/detailItem/$1';
