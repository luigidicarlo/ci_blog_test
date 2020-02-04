<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Basic Router Configuration
 */
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/** 
 * Posts Routes
 */
$route['posts'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/store'] = 'posts/store';
$route['posts/update/(:any)'] = 'posts/update/$1';
$route['posts/edit/(:any)'] = 'posts/edit/$1';
$route['posts/delete/(:any)'] = 'posts/delete/$1';
$route['posts/(:any)'] = 'posts/show/$1';

/**
 * Categories Routes
 */
$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/store'] = 'categories/store';
$route['categories/edit/(:any)'] = 'categories/edit/$1';
$route['categories/update/(:any)'] = 'categories/update/$1';
$route['categories/delete/(:any)'] = 'categories/delete/$1';
$route['categories/(:any)'] = 'categories/show/$1';

/**
 * Comments Routes
 */
$route['comments/store/(:any)'] = 'comments/store/$1';

/**
 * Users Routes
 */
$route['register'] = 'users/create';

/**
 * Static Pages Routes
 */
$route['(:any)'] = 'pages/index/$1';
