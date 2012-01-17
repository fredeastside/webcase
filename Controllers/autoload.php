<?php
// Файл класса "Автозагрузчик".
class Autoload
{
	static private function load(/*string*/$class_name)
	{
		//$class_name = strtolower($class_name);
		
		$char = substr($class_name, 0, 1);
		
		switch($char)
		{
			case 'C' : self::classExists('Controllers', $class_name);
				break;
			case 'M' : self::classExists('Models', $class_name);
				break;
			case 'V' : self::classExists('Views', $class_name);
				break;
		}
	}
	
	private function classExists($classPath, $class_name)
	{
        $root = $_SERVER['DOCUMENT_ROOT'];

		if(file_exists($root . DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $class_name . '.php'))
		{
			require_once($root . DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $class_name . '.php');
		}
		else throw new Exception('Файл ' . $root . DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $class_name . '.php,  класса '.$class_name.' - не найден!');
	}
	
	static public function register()
	{
		spl_autoload_register(array(__CLASS__, 'load'));
	}
}