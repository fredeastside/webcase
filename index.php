<?php
    header('Content-Type: text/html; charset=utf-8');
    error_reporting(E_ALL);

    session_start();

    define('__SITE_PATH', realpath(dirname(__FILE__)));

   	require_once __SITE_PATH . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'autoload.php';

    Autoload::loadClasses();

    $registry = new Registry;

    $registry->router = new Router($registry);

	if(isset($_GET['c']))
	{
	    switch($_GET['c'])
	    {
	        case 'news' : $controller = new C_News();
	            break;
	        case 'new' : $controller = new C_New();
	            break;
			case 'editnew' : $controller = new C_EditNew();
	            break;
			case 'addnew' : $controller = new C_AddNew();
	            break;
	        case 'articles' : $controller = new C_Articles();
	            break;
			case 'article' : $controller = new C_Article();
	            break;
			case 'editarticle' : $controller = new C_EditArticle();
	            break;
			case 'addarticle' : $controller = new C_AddArticle();
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
            case 'registration' : $controller = new C_Registration();
				break;
			case 'confirm' : $controller = new C_Confirm();
				break;
			case 'injustice' : $controller = new C_Injustice();
				break;
			case 'recover' : $controller = new C_Recover();
				break;
			case 'search' : $controller = new C_Search();
				break;
            case 'sitemap' : $controller = new C_Sitemap();
				break;
	        default : header('Location: /404.htm');
	    }
	}
	else
		$controller = new C_News();
		//Лажа
        $controller->Request();
?>
