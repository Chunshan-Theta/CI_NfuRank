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
/* $route['網址'] = 'controller/controller's finction/(input var)'; */



#echo ('<script>alert("route")</script>');
$route['default_controller'] = 'controller_staticpage/showview';
$route['staticpage/(:any)'] = 'controller_staticpage/showview/$1';
$route['dynamicpage'] = 'controller_dynamicpage/showview/';
$route['dynamicpage/creat'] = 'controller_dynamicpage/setsql';


$route['home'] = 'controller_dynamicpage/showview_home';
$route['class'] = 'controller_dynamicpage/showview_class';
$route['more'] = 'controller_dynamicpage/showview_more';
$route['Sclassname'] = 'controller_dynamicpage/showview_searchclassname';
$route['Steachername'] = 'controller_dynamicpage/showview_searchteachername';
$route['Smajor'] = 'controller_dynamicpage/showview_searchmajor';
$route['detail'] = 'controller_dynamicpage/showview_detail';
$route['insert2nfu'] = 'controller_dynamicpage/showview_insertsql';

$route['sqlinsertnfu'] = 'controller_dynamicpage/insertsql_nfu';

$route['insert2recall'] = 'controller_dynamicpage/showview_insertrecall';
$route['sqlinsertrecall'] = 'controller_dynamicpage/insertsql_recall';

