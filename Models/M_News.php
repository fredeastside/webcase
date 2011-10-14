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
		 
		 $menu = ''; 
        // Если страниц меньше 13, оставляем все по дефолту.
        if($count < 13)
        {          
            $i = 1;    
            $cnt = $count;            
        }
        else
        {

       // Стрелочка на 10 влево
            if($page > 10)
                $menu .= '<a href="/news/1/">стрелка влево</a> ';

       // Добавляем ссылки на две первые страницы         
            if($count > 12)
            {    
                if($page == 7)
                    $menu .= '<a href="/news/1/">1</a> '; 
                elseif($page == 8)        
                    $menu .= '<a href="/news/1/">1</a> <a href="/news/2/">2</a> ';                                      
                elseif($page > 7)        
                    $menu .= '<a href="/news/1/">1</a> <a href="/news/2/">2</a> <b>...</b> ';
            }    


            if($page < 6)
            {  // Если текущая страница в диапазоне от 1 до 5, выводим первые 10 записей
                $i = 1;
                $cnt = 10;                
            }                
            elseif($page >= $count - 5)
            {  // Если текущая страница на границе диапазона, или вышла за неё, показываем 10 последних
                $i = $count - 10; 
                $cnt = $count; 
            }
            else
            {  // В ином случае показываем 11 страниц, 5 слева от текущей, 5 справа.  
                $i = $page - 5;
                $cnt = $count;                
            }

            // Обрезаем ссылки
            if($page < 6) 
                $cnt = $i + 9;           
            elseif($count - $i > 10)
                $cnt = $i + 10;
           
        }        

      // Формируем меню       
        while($i <= $cnt)
        {
            if($i == $page)
                $menu .= '<b><font color="#ff6600">'. $i .'</font></b> ';
            else
                $menu .= '<a href="/news/'. $i .'/">'. $i .'</a> ';
                   
             $i++;           
        }             
	 
	       // Стрелочка на 10 вправо 
	                $menu .= ' <a href="/news/'. $count .'/">стрелка вправо</a>'; 
	                                   
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
