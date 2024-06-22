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
$route['login'] = 'LoginControl/index';
$route['login/google'] = 'LoginControl/loginWithGoogle';
$route['login/googleAdmin'] = 'LoginControl/loginadmin';
$route['login/handleGoogleCallback'] = 'loginControl/handleGoogleCallback';
$route['login/handleGoogleCallbackAdmin'] = 'loginControl/handleGoogleCallbackAdmin';
$route['default_controller'] = 'main';
$route['Daftar'] = 'Daftar/index';
$route['daftar/history_daftar'] = 'Daftar/history';
$route['KBK/history'] = 'KBKController/displayKBK';
$route['KBK/dana/(:any)'] = 'KBKController/updateDanaKBK/$1';
$route['KBK/dana/(:any)/(:any)'] = 'KBKController/updateDanaKBK/$1/$2';
$route['KBK/dana/(:any)/(:any)/(:any)'] = 'KBKController/updateDanaKBK/$1/$2/$3';
$route['KBK/(:any)'] = 'KBKController/index/$1';
$route['KBK/(:any)/pengajuan_event'] = 'Kegiatan/displayPengajuanEventByKbk/$1';
$route['Kegiatan/history'] = 'Kegiatan/displayHistoryEvent';
$route['Kegiatan/Review_PA'] = 'Kegiatan/displayReview';
$route['Kegiatan/Sharing_Session'] = 'Kegiatan/displaySharing';
$route['Kegiatan/Seminar'] = 'Kegiatan/displaySeminar';
$route['Kegiatan/pengajuan_history'] = 'Kegiatan/displayHistoryPengajuanEvent';
$route['Kegiatan/dafter_kegiatan'] = 'Kegiatan/displayDaftarEvent';
$route['Kegiatan'] = 'Kegiatan/index';
$route['kegiatan/semua'] = 'Kegiatan/displayAllEvent';
$route['kegiatan/event/(:any)'] = 'Kegiatan/displayOneEvent/$1';
$route['Profile'] = 'userController/profile';
$route['info'] = 'info/index';
$route['Users/history'] = 'userController/displayUser';
$route['404_override'] = 'errors/show_404';
$route['translate_uri_dashes'] = FALSE;

