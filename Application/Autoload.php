<?php
// Файл класса "Автозагрузчик".
class Autoload
{
	static private function load($class_name)
	{
		$char = substr($class_name, 0, 1);

        $start_dir =  __SITE_PATH . DIRECTORY_SEPARATOR;

		switch($char)
		{
			case 'C' : self::classExists($start_dir . 'Controllers', $class_name);
				break;
			case 'M' : self::classExists($start_dir . 'Models', $class_name);
				break;
			default : self::classExists($start_dir . 'Application', $class_name);
		}
	}
	
	private function classExists($classPath, $class_name)
	{
        $path = $classPath . DIRECTORY_SEPARATOR . $class_name . '.php';

		if(file_exists($path))
		{
			require_once $path;
		}
		else self::classLibsExists($classPath, $class_name);
	}

    private function classLibsExists($classPath, $class_name)
    {
        if(file_exists($classPath . DIRECTORY_SEPARATOR . 'Smarty' . DIRECTORY_SEPARATOR . 'Smarty.class.php'))
		{
			require_once $classPath . DIRECTORY_SEPARATOR . 'Smarty' . DIRECTORY_SEPARATOR . 'Smarty.class.php';
		}
        elseif(file_exists($classPath . DIRECTORY_SEPARATOR . 'PhpMailer' . DIRECTORY_SEPARATOR . 'class.phpmailer.php'))
        {
            $classPath . DIRECTORY_SEPARATOR . 'PhpMailer' . DIRECTORY_SEPARATOR . 'class.phpmailer.php';
        }
        else throw new Exception('Файл ' . $class_name . '.php,  класса '.$class_name.' - не найден!');
    }
	
	static public function loadClasses()
	{
		spl_autoload_register(array(__CLASS__, 'load'));
	}
}