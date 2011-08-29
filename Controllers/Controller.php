<?php
// abstract класс контроллера сайта
abstract class Controller
	{
        // конструктор класса
		function __construct()
		{
		}

       /**
        * @abstract функция полного HTTP - запроса
        */
		public function Request()
		{
			$this->OnInput();
			$this->OnOutput();
		}

       /*
        * @abstract функция виртуального обработчика запроса
        */
		protected function OnInput()
		{
		}

       /*
        * @abstract функция виртуального генератора HTML
        */
		protected function OnOutput()
		{
		}

       /*
        * @abstract функция проверки метода GET
        *
        * @return bool
        */
		protected function IsGet()
		{
			return $_SERVER['REQUEST_METHOD'] == 'GET';
		}

       /*
        * @abstract функция проверки метода POST
        *
        * @return bool
        */
		protected function IsPost()
		{
			return $_SERVER['REQUEST_METHOD'] == 'POST';
		}

       /*
        *@ abstract функция генерации HTML шаблона в строку
        *
        * @param string $fileName - путь к файлу шаблона
        * @param array $vars - переменные шаблона
        *
        * @return string
        */
		protected function View($fileName, $vars = array())
		{
			foreach($vars as $k => $v)
			{
				$$k = $v;
			}
			
			ob_start();
			
			include $fileName;
			
			return ob_get_clean();
		}
	}
?>