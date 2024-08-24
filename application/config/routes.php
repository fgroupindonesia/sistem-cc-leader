<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Display/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'Display/login';
$route['logout'] = 'Works/logout';
$route['insert-formulir'] = 'Works/add_formulir';
$route['display-formulir'] = 'Display/display_formulir';
$route['display-data-formulir'] = 'Display/display_data_formulir';
$route['form'] = 'Works/input_data_formulir';
$route['dashboard'] = 'Display/dashboard';
$route['management-staff'] = 'Display/management_staff';
$route['management-formulir'] = 'Display/management_formulir';
$route['add-new-formulir'] = 'Display/add_new_formulir';
$route['add-new-staff'] = 'Display/add_new_staff';
$route['success'] = 'Display/success';
$route['add-new-data-formulir'] = 'Works/add_data_formulir';
$route['delete-formulir'] = 'Works/delete_formulir';