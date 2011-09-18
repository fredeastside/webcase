<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 18.09.11
 * Time: 23:07
 * To change this template use File | Settings | File Templates.
 * Менеджер пользователей
 */
 class M_Users{
     
     private static $instance;
     private $msql;

     public function __construct()
     {
         $this->msql = M_SQL::Instance();
     }

     public static function Instance()
     {
         if(self::$instance == null)
             self::$instance = new M_Users();

         return self::$instance;
     }

 }
