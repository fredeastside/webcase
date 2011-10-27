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

     public function ViewAllNews($num, $page)
     {
         $query = "SELECT id_new, title_new, content_new FROM tbl_news ORDER BY id_new DESC LIMIT " . (($page - 1) * $num) . ', ' . $num;

         return $this->msql->Select($query);
     }
	 
	 /*public function NewsInsert()
	 {
		    $res = $this->msql->Select('SELECT MAX(id_new) AS cnt FROM tbl_news');
			
			$i = $res[0]['cnt'];
		    
		    while(++$i <= 10000)
		    {   
				$data = array();
				
				$data['title_new'] = $i + 30;
				$data['date_new'] = date("Y-m-d H:i:s");
				$data['author_new'] = 'fuf';
				$data['content_new'] = 'fufufufufufufuf';
		        $this->msql->Insert('tbl_news', $data);
		    }
	 }*/
	 
	 public function CreatePagesMenu($num, $page)
     {
         $query = "SELECT COUNT(*) AS 'cnt' FROM tbl_news";

         $result = $this->msql->Select($query);
		 
		 if(!$result)
			return null;
		 
		 $count = ceil($result[0]['cnt'] / $num);
		 
		 if( $count < 6 )
			return null;
		 
		 if($page > $count || $page < 1)
		 {
			header('Location: /');
		 }
		 
		 $menu = ''; 
		
		 if($count < 9)
		 {
            $i = 1;    
            $cnt = $count;            
		 }
		 else
		 {
			$i = 1;
			$cnt = 8;
			
			if($page == 5)
			{
				$i = 1;
				$cnt = 9;
			}
				
			if($page > 5 && $page < ($count - 4))
			{
				$i = $page - 4;
				$cnt = $page + 4;
			}
			
			if($page > 5 && $page >= ($count - 4))
			{
				$i = $count - 8;
				$cnt = $count;
			}
		 }
		 
		 $left = ($page == 1) ? 'назад' : '<a href="/news/' . ($page - 1) . '/">назад</a>';
		 $right = ($page == $count) ? 'вперед' : '<a href="/news/' . ($page + 1) . '/">вперед</a>';
		 
		 if($count != 1)
			$menu .= '<p>' . $left . ' ' . $right . '</p>';
		 
         if($page > 5)
            $menu .= '<a href="/news/1/">&#8592;</a> ';

      // Формируем меню       
        while($i <= $cnt)
        {
            if($i == $page)
                $menu .= '<b>'. $i .'</b> ';
            else
                $menu .= '<a href="/news/'. $i .'/">'. $i .'</a> ';
                   
             $i++;           
        }             
	 
		if($page < ($count - 4))
	       // Стрелочка на вправо 
	                $menu .= ' <a href="/news/'. $count .'/">&#8594;</a>'; 
	                                   
	        return $menu;  	 
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
