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
        protected $smarty;
		
		private $lastNews;

        function __construct()
        {
            $this->smarty = new SmartyHeir();
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
            $mUsers->ClearUsers();
            $mUsers->ClearLinksForChangePassword();
            $this->user = $mUsers->Get();
			
			$mNews = M_News::Instance();

			$this->lastNews = $mNews->lastNews();
			
            $this->title = 'Web thrust | ';
            $this->content = '';
            $this->generateTime = microtime(true);

            if($this->user == null && $this->needLogin)
            {
                header('Location: /login.html');
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
            $this->smarty->assign(array('title' => $this->title,
                                        'content' => $this->content,
                                        'user' => $this->user,
                                        'lastNews' => $this->lastNews));
            
            $this->smarty->display('main.tpl');

            //$page .= sprintf("<!-- Время работы скрипта: %.5f c -->", microtime(true) - $this->generateTime);

            //echo $page;
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
        protected function doIntroDescription($content)
        {
            if(strlen($content) > 450)
            {
                $content = mb_substr($content, 0, 450, 'UTF-8') . ' ...';
            }

            return $content;
        }
		
		protected function JsonEncodeCyr($json_arr) 
		{
			 $cyr_chars = array (
				 '\u0430' => 'а', '\u0410' => 'А',
				 '\u0431' => 'б', '\u0411' => 'Б',
				 '\u0432' => 'в', '\u0412' => 'В',
				 '\u0433' => 'г', '\u0413' => 'Г',
				 '\u0434' => 'д', '\u0414' => 'Д',
				 '\u0435' => 'е', '\u0415' => 'Е',
				 '\u0451' => 'ё', '\u0401' => 'Ё',
				 '\u0436' => 'ж', '\u0416' => 'Ж',
				 '\u0437' => 'з', '\u0417' => 'З',
				 '\u0438' => 'и', '\u0418' => 'И',
				 '\u0439' => 'й', '\u0419' => 'Й',
				 '\u043a' => 'к', '\u041a' => 'К',
				 '\u043b' => 'л', '\u041b' => 'Л',
				 '\u043c' => 'м', '\u041c' => 'М',
				 '\u043d' => 'н', '\u041d' => 'Н',
				 '\u043e' => 'о', '\u041e' => 'О',
				 '\u043f' => 'п', '\u041f' => 'П',
				 '\u0440' => 'р', '\u0420' => 'Р',
				 '\u0441' => 'с', '\u0421' => 'С',
				 '\u0442' => 'т', '\u0422' => 'Т',
				 '\u0443' => 'у', '\u0423' => 'У',
				 '\u0444' => 'ф', '\u0424' => 'Ф',
				 '\u0445' => 'х', '\u0425' => 'Х',
				 '\u0446' => 'ц', '\u0426' => 'Ц',
				 '\u0447' => 'ч', '\u0427' => 'Ч',
				 '\u0448' => 'ш', '\u0428' => 'Ш',
				 '\u0449' => 'щ', '\u0429' => 'Щ',
				 '\u044a' => 'ъ', '\u042a' => 'Ъ',
				 '\u044b' => 'ы', '\u042b' => 'Ы',
				 '\u044c' => 'ь', '\u042c' => 'Ь',
				 '\u044d' => 'э', '\u042d' => 'Э',
				 '\u044e' => 'ю', '\u042e' => 'Ю',
				 '\u044f' => 'я', '\u042f' => 'Я',
		  
				 '\r' => '',
				 '\n' => '<br />',
				 '\t' => ''
			 );
				
				$json_str = strtr( json_encode($json_arr), $cyr_chars );
				
			 //foreach($json_arr as $key => $value)
			 //{
				
			 //}
			 return $json_str;
		}
	}
?>