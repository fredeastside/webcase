<?php
	// абстрактный класс контроллера страницы сайта
	abstract class C_Page extends Controller
	{
		protected $title; // title страницы
		protected $content; // контент страницы
		protected $generateTime; // время работы скрипта
		protected $menu; // меню сайта
		
	   /**
		*@protected функция генерация запроса на вход
		*
		*@return bool
		*/
		protected function OnInput()
        {
            $this->title = 'Web-футляр | ';
            $this->content = '';
            $this->generateTime = microtime(true);
        }
		
	   /**
		*@protected функция генерация html на выход
		*
		*@return bool
		*/
        protected function OnOutput()
        {
            $vars = array('title' => $this->title, 'content' => $this->content);

            $page = $this->View('Views/main.php', $vars);

            $page .= sprintf("<!-- Время работы скрипта: %.5f c -->", microtime(true) - $this->generateTime);

            echo $page;
        }
	}
?>