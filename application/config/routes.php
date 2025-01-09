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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Recruitment';
$route['job_description/(:num)'] = 'recruitment/job_description/$1';
$route['registration/candidate'] = 'recruitment/create_account_candidate/';
$route['privacy-policy'] = 'recruitment/privacy_policy/';
$route['resume-test'] = 'recruitment/resume_test/';
$route['employer-dashboard'] = 'recruitment/employer_dashboard/';
$route['employer-candidate-profile'] = 'recruitment/employer_candidate_profile/';
$route['employer-candidate'] = 'recruitment/employer_candidate/';
$route['employer-company'] = 'recruitment/employer_company/';
$route['template1_convert_pdf'] = 'Resume_builder/template1_convert_pdf/';
$route['template2_convert_pdf'] = 'Resume_builder/template2_convert_pdf/';
$route['404'] = 'recruitment/error_404/';
$route['error-404'] = 'recruitment/page_404/';
$route['contact-us'] = 'recruitment/contact_us/'; 
$route['resume-builder'] = 'recruitment/resume_builder/';
$route['blog'] = 'recruitment/blog/';
$route['blog_details'] = 'recruitment/blog_details/';
$route['terms-and-conditions'] = 'recruitment/terms_and_conditions/';
$route['beware-of-fraud'] = 'recruitment/beware_of_fraud/';
// $route['company-login'] = 'recruiter/company_login/';
$route['job_post/index'] = 'job_post/index'; 
/*$route['404_override'] = 'Error_404';*/
$route['translate_uri_dashes'] = FALSE;
$route['job_post/edit_index/(:num)'] = 'job_post/edit_index/$1';
$route['auth/googleLogin'] = 'auth/googleLogin';
$route['auth/googleCallback'] = 'auth/googleCallback';
$route['linkedin/login'] = 'linkedin/login';
$route['linkedin/callback'] = 'linkedin/callback';

