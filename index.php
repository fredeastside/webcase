<?php
    header('Content-Type: text/html; charset=utf-8');
    error_reporting(E_ALL);

    session_start();

    define('__SITE_PATH', realpath(dirname(__FILE__)));

   	require_once __SITE_PATH . DIRECTORY_SEPARATOR . 'Application' . DIRECTORY_SEPARATOR . 'Autoload.php';

    Autoload::loadClasses();

    $registry = new Registry;

    $registry->router = new Router($registry);

    $registry->router->loader();
