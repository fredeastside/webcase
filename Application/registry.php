<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 22.01.12
 * Time: 18:49
 */
class Registry {
    private $vars = array();

    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function __get($name)
    {
        return $this->vars[$name];
    }
}
 
