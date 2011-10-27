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
    private static $instance;
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
	
	/*
    public function ViewAllArticles()
    {
        $query = "SELECT id_article, title_article, content_article FROM tbl_articles ORDER BY id_article DESC";
		
		return $this->msql->Select($query);
    }
	*/
	
	public function ViewAllTypedArticles($type, $num, $page)
	{
		$str = "SELECT id_article, title_article, content_article FROM tbl_articles WHERE type_article = '%s' ORDER BY id_article DESC LIMIT " . (($page - 1) * $num) . ', ' . $num;
		
		$query = sprintf($str, $type);
		
		return $this->msql->Select($query);
	}
	
	 public function CreatePagesMenu($num, $page)
     {
         $query = "SELECT COUNT(*) AS 'cnt' FROM tbl_articles";
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
		 
		 // анализируем меню
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
	
   /*
	*@public ������� ��� ��������� ��������� ������
	*
	*@param $article_id - ������������� ��������� ������
	*
	*@return array - ������������� ������ (������� - ��������)
	*/
	public function ViewArticle($article_id)
	{
		$str = "SELECT * FROM tbl_articles WHERE id_article = '%d'";
		
		$query = sprintf($str, $article_id);
		
		return $this->msql->Select($query);
	}
	
		 public function UpdateArticle($id, $title, $author, $date, $content)
	 {
		$article = array('title_article' => $title, 'author_article' => $author, 'date_article' => $date, 'content_article' => $content,);
		
		$str = "id_article = '%d'";
		
		$where = sprintf($str, $id);
		
		return $this->msql->Update('tbl_articles', $article, $where);
	 }
	 
	 public function DeleteArticle($id_article)
	 {
		$str = "id_article = '%d'";
		$where = sprintf($str, $id_article);
		
		return $this->msql->Delete('tbl_articles', $where);
	 }
	 
	 public function AddArticle($title, $date, $author, $content, $section)
	 {
		$data = array('title_article' => $title, 'date_article' => $date, 'author_article' => $author, 'content_article' => $content, 'type_article' => $section);
		
		return $this->msql->Insert('tbl_articles', $data);
	 }
}
 
