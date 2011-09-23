<?php
class C_Javascript extends C_Page{
	private $articlesJs;
	private $mArticlesJs;
	
	protected function OnInput()
	{
	
		parent::OnInput();
	
		$this->mArticlesJs = M_Articles::Instance();
		
		$this->title .= 'Статьи | Javascript';
		
		$this->articlesJs = $this->mArticlesJs->ViewAllTypedArticles('javascript');
		
		for($i = 0, $cnt = count($this->articlesJs); $i < $cnt; $i++)
		{
			$this->articlesJs[$i]['content_article'] = $this->doIntroDescription($i, $this->articlesJs[$i]['content_article'], 'article');
		}
	}
	
	protected function OnOutput()
	{
		$vars = array('articles' => $this->articlesJs);
		
		$this->content = $this->View('/Views/ViewAllArticles.php', $vars);
		
		parent::OnOutput();
	}
}
?>