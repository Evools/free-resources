<?php
session_start();
require_once __DIR__ . '/router.php';

get('/', 'pages/index.php');
get('/contact', 'pages/contact.php');
get('/about', 'pages/about.php');

get('/dashboard', 'pages/dashboard.php');

get('/add-post', 'pages/add-post.php');
post('/add-post', 'pages/add-post.php');

get('/signin', 'pages/login.php');
get('/signup', 'pages/register.php');
get('/logout', 'pages/logout.php');

post('/signin', 'pages/login.php');
post('/signup', 'pages/register.php');

any('/404', 'pages/404.php');
