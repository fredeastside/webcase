<?php
	// абстрактный класс контроллера страницы сайта
	abstract class C_Page extends Controller
	{
		protected $title; // title страницы
		protected $content; // контент страницы
		protected $generateTime; // время работы скрипта
		protected $menu; // меню сайта
        protected $needLogin; //
        protected $user; //

        function __construct()
        {
            $this->needLogin = false;
            $this->user = null;
        }

	   /**
		*@protected функция генерация запроса на вход
		*
		*@return bool
		*/
		protected function OnInput()
        {
            $mUsers = M_Users::Instance();
            $mUsers->ClearSessions();
            $this->user = $mUsers->Get();
            $this->title = 'Web-футляр | ';
            $this->content = '';
            $this->generateTime = microtime(true);

            if($this->user == null && $this->needLogin)
            {
                header('Location: index.php?c=login');
                die();
            }
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

       /*
        * @abstract функция краткого описания контента
        *
        * @param int $id - номер контента из бд, для формирования ссылки "Читать далее=>"
        * @param string $content - строка, представляющая контент
        * @param string $method - название метода для просмотра полного содержания контента
        *
        * @throws Exception если такого id нет
        *
        * @return string
        */
        protected function doIntroDescription($id, $content, $method)
        {
            if(strlen($content) > 450)
            {
                $content = mb_substr($content, 0, 450, 'UTF-8') . ' ...';
            }

            return $content;
        }
	}
?>