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
$route['default_controller'] = 'dashboard';
$route['logout'] = 'dashboard/logout';

// users
$route['users/(:any)'] = 'user/$1';
$route['add_user'] = 'user/add_user';
$route['profile'] = 'user/profile';
$route['edit_user'] = 'user/edit_user';
$route['delete_user'] = 'user/delete_user';

// Complain 
$route['complain/(:any)'] = 'complain/$1';
$route['add_complain'] = 'complain/add_complain';
$route['edit_complain'] = 'complain/edit_complain';
$route['delete_complain'] = 'complain/delete_complain';

//Noftication
$route['notification/(:any)'] = 'notification/$1';
$route['add_notification'] = 'notification/add_notification';
$route['edit_notification'] = 'notification/edit_notification';
$route['delete_notification'] = 'notification/delete_notification';

// Vehicle
$route['vehicle/(:any)'] = 'vehicle/$1';
$route['add_vehicle'] = 'vehicle/add_vehicle';
$route['edit_vehicle'] = 'vehicle/edit_vehicle';
$route['delete_vehicle'] = 'vehicle/delete_vehicle';

// Seats
$route['seat/(:any)'] = 'seat/$1';
$route['add_seat'] = 'seat/add_seat';
$route['edit_seat'] = 'seat/edit_seat';
$route['delete_seat'] = 'seat/delete_seat';

// locations
$route['add_vehiclelocation'] = 'location/add_vehiclelocation';
$route['edit_vehiclelocation'] = 'location/edit_vehiclelocation';
$route['delete_vehiclelocation'] = 'location/delete_vehiclelocation';
$route['location/(:any)'] = 'location/$1';

// Booking History
$route['booking/(:any)'] = 'booking/$1';

// History
$route['history/(:any)'] = 'history/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
