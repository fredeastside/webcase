<?php

// Файл класса "Автозагрузчик".
// Класс "Автозагрузчик" - преобразует поступившие имена классов, вида: core_classes_dbconnect
// в путь и имя файла core/classes/dbconnect.php 
// и автоматич. подключает файл с определением класса, для возможности создания его
// экземпляра

class Autoload
{
	const ROOT = $_SERVER['DOCUMENT_ROOT'] . '/';
	
	static private function load(/*string*/$class_name)
	{
		$class_name = strtolower($class_name);
		
		$char = substr($class_name, 0, 1);
		
		switch($char)
		{
			case 'c' : $this->classExists('Controllers', $class_name);
				break;
			case 'm' : $this->classExists('Models', $class_name);
				break;
			case 'v' : $this->classExists('Views', $class_name);
				break;
		}
	}
	
	private function classExists($classPath, $class_name)
	{
		if(file_exists(self::ROOT . '/' . $classPath . '/' . $class_name . '.php'))
		{
			require_once(self::ROOT . '/' . $classPath . '/' . $class_name . '.php');
		}
		else throw new Exception('Файл ' . self::ROOT . $classPath . $class_name . '.php,  класса '.$class_name.' - не найден!');
	}
	
	static public function register()
	{
		spl_autoload_register(array(__CLASS__, 'load'));
	}
}