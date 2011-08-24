<?php
	abstract class C_Page extends Controller
	{
		protected $title;
		protected $content;
		protected $generateTime;
		protected $menu;
		
		protected function OnInput()
        {
            $this->title = 'Web-футляр | ';
            $this->content = '';
            $this->generateTime = microtime(true);
        }

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
                $content = substr($content, 0, 450) . ' ...';
            }

            return $content;
        }
	}
?>