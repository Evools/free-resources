<?php

require_once __DIR__ . '/router.php';

get('/', 'pages/index.php');
get('/contact', 'pages/contact.php');
get('/about', 'pages/about.php');

//get('/user/$id', 'views/user');
//get('/user/$name/$last_name', 'views/full_name.php');
//get('/product/$type/color/$color', 'product.php');
//get('/callback', function () {
//  echo 'Callback executed';
//});
//get('/callback/$name', function ($name) {
//  echo "Callback executed. The name is $name";
//});
//get('/product', '');
//get('/callback/$name/$last_name', function ($name, $last_name) {
//  echo "Callback executed. The full name is $name $last_name";
//});
//post('/user', '/api/save_user');

any('/404', 'pages/404.php');
