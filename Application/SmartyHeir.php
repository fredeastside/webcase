<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 06.02.12
 * Time: 21:30
 */
class SmartyHeir extends Smarty{
    function __construct()
    {
        parent::__construct();

        $this->template_dir = __SITE_PATH . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'templates';
        $this->compile_dir = __SITE_PATH . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'templates_c';
        $this->config_dir = __SITE_PATH . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'configs';
        $this->cache_dir = __SITE_PATH . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'cache';

        $this->caching = false;
    }
}
 
