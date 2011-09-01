<?Sql
class C_Sql extends C_Page{
	private $articlesSql;
	private $mArticlesSql;
	
	protected function OnInput()
	{
		$this->mArticlesSql = M_Articles::Instance();
		
		$this->title .= 'Статьи | SQL';
		
		$this->articlesSql = $this->mArticlesSql->ViewAllTypedArticles('sql');
		
		for($i = 0, $cnt = count($this->articlesSql); $i < $cnt; $i++)
		{
			$this->articlesSql[$i]['content_article'] = $this->doIntroDescription($i, $this->articles[$i]['content_article'], 'article');
		}
	}
	
	protected function OnOutput()
	{
		$vars = array('articles' => $this->articlesSql);
		
		$this->content = $this->View('/Views/ViewAllArticles.Sql', $vars);
		
		parent::OnOutput();
	}
}
?>