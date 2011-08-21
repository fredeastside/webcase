<?php
	header('Content-Type: text/html; charset=utf-8');
    error_reporting(E_ALL);

    function __autoload($className)
	{
    	require_once '/Controllers/' . $className . '.php';
	}

    switch($_GET['c'])
    {
        case 'news' : $controller = new C_News();
            break;
        case 'new' : $controller = new C_New();
            break;
        case 'articles' : $controller = new C_Articles();
            break;
        case 'php' : $controller = new C_PHP();
            break;
        case 'javascript' : $controller = new C_Javascript();
            break;
        case 'sql' : $controller = new C_SQL();
            break;
        default : $controller = new C_News();
    }

    $controller->Request();
?>
