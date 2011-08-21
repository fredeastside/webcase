<?php
	abstract class Controller
	{
		function __construct()
		{
		}
		
		public function Request()
		{
			$this->OnInput();
			$this->OnOutput();
		}
		
		protected function OnInput()
		{
		}
		
		protected function OnOutput()
		{
		}
		
		protected function IsGet()
		{
			return $_SERVER['REQUEST_METHOD'] == 'GET';
		}
		
		protected function IsPost()
		{
			return $_SERVER['REQUEST_METHOD'] == 'POST';
		}
		
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