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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['tentang-kami'] = 'about';
$route['plant-library'] = 'plant_library';
$route['detail/:any'] = 'plant_library/detail';

// ======================== ADMIN =======================================
// $route["admin/auth/login/process"]  = "admin_auth/login_process";
// $route["admin/auth/login"]          = "admin_auth/login";
$route["admin/plant/list"]                = "admin_plant/plant_list";
$route["admin/plant/add"]                 = "admin_plant/plant_add";
$route["admin/plant/detail"]              = "admin_plant/plant_detail";
$route["admin/plant/add_process"]         = "admin_plant/plant_add_process";
$route["admin/plant/update_process"]      = "admin_plant/plant_update_process";

$route["admin/plants"]                    = "admin_plant/index";

$route["admin/user"]                      = "user/index";
$route["admin/group"]                     = "group/index";
$route["admin/user/detail/:num"]          = "user/user_detail";
$route["admin/user/update/process"]       = "user/user_update_process";
$route["admin/user/add/process"]          = "user/user_add_process";
$route["admin/user/list"]                 = "user/user_list";
$route["admin/user/add"]                  = "user/user_add";
$route["admin/user/delete"]               = "user/user_delete_process";

$route["admin/group/roles/update"]        = "group/group_roles_update_process";
$route["admin/group/roles/:num"]          = "group/group_roles";
$route["admin/group/detail/:num"]         = "group/group_detail";
$route["admin/group/update/process"]      = "group/group_update_process";
$route["admin/group/add/process"]         = "group/group_add_process";
$route["admin/group/list"]                = "group/group_list";
$route["admin/group/add"]                 = "group/group_add";
$route["admin/group/delete"]              = "group/group_delete_process";

$route["admin/login/process"]             = "admin_auth/login_process";
$route["admin/login"]                     = "admin_auth";
$route["admin/login/pass"]                = "admin_auth/pass";
$route["admin/logout"]                    = "admin_auth/logout";

$route["admin"]                           = "admin_plant/index";// change to dashboard soon
// ======================== END ADMIN ===================================

// ======================== LANDING PAGE ================================
$route["unauthorized"]          = "page/unauthorized";
$route['default_controller']    = 'home';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

// ======================== END LANDING PAGE ===========================
