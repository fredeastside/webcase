<?php
// Файл класса "Автозагрузчик".
class Autoload
{
	static private function load(/*string*/$class_name)
	{
		$class_name = strtolower($class_name);
		
		$char = substr($class_name, 0, 1);
		
		switch($char)
		{
			case 'c' : self::classExists('Controllers', $class_name);
				break;
			case 'm' : self::classExists('Models', $class_name);
				break;
			case 'v' : self::classExists('Views', $class_name);
				break;
		}
	}
	
	private function classExists($classPath, $class_name)
	{
        $root = $_SERVER['DOCUMENT_ROOT'];

		if(file_exists($root . '/' . $classPath . '/' . $class_name . '.php'))
		{
			require_once($root . '/' . $classPath . '/' . $class_name . '.php');
		}
		else throw new Exception('Файл ' . $root . $classPath . $class_name . '.php,  класса '.$class_name.' - не найден!');
	}
	
	static public function register()
	{
		spl_autoload_register(array(__CLASS__, 'load'));
	}
}