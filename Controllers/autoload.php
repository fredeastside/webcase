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
			case 'R' : self::classExists('Application', $class_name);
				break;
		}
	}
	
	private function classExists($classPath, $class_name)
	{
		if(file_exists(__SITE_PATH . DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $class_name . '.php'))
		{
			require_once(__SITE_PATH . DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $class_name . '.php');
		}
		else throw new Exception('Файл ' . __SITE_PATH . DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $class_name . '.php,  класса '.$class_name.' - не найден!');
	}
	
	static public function loadClasses()
	{
		spl_autoload_register(array(__CLASS__, 'load'));
	}
}