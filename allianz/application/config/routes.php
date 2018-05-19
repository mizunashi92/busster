<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['productpage'] = 'productpage/index'; //product
$route['hit'] = 'hit/index'; //hit counter
$route['users'] = 'admin/index'; //user profile*
$route['mypage'] = 'members/mypage'; 
$route['products'] = 'products/index'; //product *
$route['password'] = 'members/password';	
$route['member'] = 'members/index';	 //membership *
$route['forgot'] = 'agents/forgot';	
$route['signup'] = 'agents/sign_up';	
$route['contacts/(:any)'] = 'contacts/index/$1'; //contact us
$route['contacts'] = 'contacts/index';	

$route['gallery'] = 'gallery/index/$1';	
$route['videos'] = 'videos/index';
$route['posts/update'] = 'posts/update';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['about/(:any)'] = 'about/index/$1'; //about me replica
$route['articles/(:any)/(:any)'] = 'pages/view_post/$1/$1';
$route['articles/(:any)'] = 'pages/view_post/$1';
$route['contents'] = 'contents/index'; //view my page 
$route['default_controller'] = 'pages/view'; //home index
$route['(:any)'] = 'pages/view_agent/$1';	// replica
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
