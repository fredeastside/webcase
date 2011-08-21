<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 20.08.11
 * Time: 20:10
 * To change this template use File | Settings | File Templates.
 */
class M_Articles extends M_SQL
{
    public static $instance;
    private $msql;

    public static function Instance()
    {
        if(self::$instance == null)
            self::$instance = new M_Articles();

        return self::$instance;
    }

    function __construct()
    {
        $this->msql = M_SQL::Instance();
    }

    public function ViewAllArticles()
    {
        
    }
}
 
