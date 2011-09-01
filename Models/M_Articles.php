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
	
	public function ViewAllTypedArticles($type)
	{
		$str = "SELECT id_article, title_article, content_article FROM tbl_articles WHERE type = '%s'";
		
		$query = sprintf($str, $type);
		
		return $this->msql->Select($query);
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
}
 
