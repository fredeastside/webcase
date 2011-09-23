<?php
    header('Content-Type: text/html; charset=utf-8');
    error_reporting(E_ALL);

    session_start();

   	require_once '/Controllers/autoload.php';
	Autoload::register();

	if(isset($_GET['c']))
	{
	    switch($_GET['c'])
	    {
	        case 'news' : $controller = new C_News();
	            break;
	        case 'new' : $controller = new C_New();
	            break;
	        case 'articles' : $controller = new C_Articles();
	            break;
			case 'article' : $controller = new C_Article();
	            break;
	        case 'php' : $controller = new C_PHP();
	            break;
	        case 'javascript' : $controller = new C_Javascript();
	            break;
	        case 'sql' : $controller = new C_SQL();
	            break;
			case 'login' : $controller = new C_Login();
				break;
			case 'logout' : $controller = new C_Logout();
				break;
	        default : $controller = new C_News();
	    }
	}
	else
		$controller = new C_News();

    $controller->Request();
?>
