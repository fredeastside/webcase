<?php
class M_Search extends M_SQL{
	private $msql;
	private static $instance;
	
	public static function Instance()
	{
		if(self::$instance == null)
			self::$instance = new M_Search();
			
		return self::$instance;
	}
	
	function __construct()
	{
		$this->msql = M_SQL::Instance();
	}

	public function Search($data)
	{
		if(strlen($data) < 5)
			return 'К сожалению, поиск не дал результатов.';
			
		$str = "SELECT id_article AS id, title_article AS title, author_article AS author, content_article AS content, 1 AS number FROM tbl_articles WHERE MATCH(title_article, author_article, content_article) AGAINST ('%s')
				UNION ALL
				SELECT id_new AS new, title_new AS title, author_new AS author, content_new AS content, 2 AS number FROM tbl_news WHERE MATCH(title_new, author_new, content_new) AGAINST ('%s')";
				
		$query = sprintf($str, $data, $data);
		
		$result = $this->msql->Select($query);
		
		if(!count($result))
			return 'К сожалению, поиск не дал результатов.';
			
		return $result;
	}
}
?>