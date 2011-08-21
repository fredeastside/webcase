<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 10.08.11
 * Time: 22:51
 * To change this template use File | Settings | File Templates.
 */

require_once '/Models/M_SQL.php';

 class M_News extends M_SQL
{
     private static $instance;
     private $msql;

     public static function Instance()
     {
         if(self::$instance == null)
             self::$instance = new M_News();

         return self::$instance;
     }

     function __construct()
     {
         $this->msql = M_SQL::Instance();
     }

     public function ViewAllNews()
     {
         $query = "SELECT id_new, title_new, content_new FROM tbl_news ORDER BY id_new DESC";

         return $this->msql->Select($query);
     }

     public function ViewNew($new_id)
     {
         $str = "SELECT * FROM tbl_news WHERE id_new = '%d'";
         $query = sprintf($str, $new_id);

         return $this->msql->Select($query);
     }
}
