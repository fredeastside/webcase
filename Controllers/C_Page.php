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
	}
?>