<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 10.08.11
 * Time: 22:51
 * To change this template use File | Settings | File Templates.
 */
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
	 
	 public function lastNews()
     {
         $query = "SELECT id_new, title_new FROM tbl_news ORDER BY id_new DESC LIMIT 0, 7";

         return $this->msql->Select($query);
     }

     public function ViewNew($new_id)
     {
         $str = "SELECT * FROM tbl_news WHERE id_new = '%d'";
         $query = sprintf($str, $new_id);

         return $this->msql->Select($query);
     }
	 
	 public function UpdateNew($id, $title, $author, $date, $content)
	 {
		$new = array('title_new' => $title, 'author_new' => $author, 'date_new' => $date, 'content_new' => $content,);
		
		$str = "id_new = '%d'";
		
		$where = sprintf($str, $id);
		
		return $this->msql->Update('tbl_news', $new, $where);
	 }
	 
	 public function DeleteNew($id_new)
	 {
		$str = "id_new = '%d'";
		$where = sprintf($str, $id_new);
		
		return $this->msql->Delete('tbl_news', $where);
	 }
	 
	 public function AddNew($title, $date, $author, $content)
	 {
		$data = array('title_new' => $title, 'date_new' => $date, 'author_new' => $author, 'content_new' => $content);
		
		return $this->msql->Insert('tbl_news', $data);
	 }
}
