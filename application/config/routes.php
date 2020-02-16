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

$route['default_controller'] = 'Welcome';

// 结节筛查
$route['pnscreening'] = 'PNScreening';
$route['info'] = 'UserInfo';
$route['consult'] = 'Consulting';
$route['dynamics'] = 'Dynamics';
$route['dynamics/(:num)'] = 'Dynamics/articles/$1';

// 心胸百科
$route['category/(:any)'] = 'Category/index/$1';
$route['category/(:any)/(:num)'] = 'Category/articles/$1/$2';

// 新技术
$route['newtech/(:num)'] = 'Newtech/articles/$1';

// 医生登陆
$route['login'] = 'Login';
$route['logout'] = 'Login/logout';
$route['login/process'] = 'Login/process';

// 医生入口 - 结节筛查
$route['pnscreening_doctor'] = 'PNScreeningDoc';
$route['pnscreening_doctor/(:any)'] = 'PNScreeningDoc/comment/$1';

// 患者管理
$route['patientmanager'] = 'PatientManager';
$route['patientmanager/checkin/(:any)'] = 'PatientManager/checkin/$1';
$route['patientmanager/checkin_uncheck/(:any)'] = 'PatientManager/checkin_uncheck/$1';
$route['patientmanager/checkout/(:any)'] = 'PatientManager/checkout/$1';
$route['patientmanager/checkout_uncheck/(:any)'] = 'PatientManager/checkout_uncheck/$1';
$route['patientmanager/followup/(:any)'] = 'PatientManager/followup/$1';
$route['patientmanager/data'] = 'PatientManager/data';
$route['patientmanager/data/(:any)'] = 'PatientManager/timelinedata/$1';

// 咨询沟通
$route['consulting_doctor'] = 'Consulting';
$route['send-message'] = 'Consulting/send_text_message';
$route['chat-attachment/upload'] = 'Consulting/send_text_message';
$route['get-chat-history'] = 'Consulting/get_chat_history';
$route['get-card-info'] = 'Consulting/get_card_info';
$route['get-message-notification'] = 'Consulting/get_message_notification';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
