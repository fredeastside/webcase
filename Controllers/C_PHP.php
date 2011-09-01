<?php
class C_Php extends C_Page{
	private $articlesPhp;
	private $mArticlesPhp;
	
	protected function OnInput()
	{
		$this->mArticlesPhp = M_Articles::Instance();
		
		$this->title .= 'Статьи | PHP';
		
		$this->articlesPhp = $this->mArticlesPhp->ViewAllTypedArticles('php');
		
		for($i = 0, $cnt = count($this->articlesPhp); $i < $cnt; $i++)
		{
			$this->articlesPhp[$i]['content_article'] = $this->doIntroDescription($i, $this->articlesPhp[$i]['content_article'], 'article');
		}
	}
	
	protected function OnOutput()
	{
		$vars = array('articles' => $this->articlesPhp);
		
		$this->content = $this->View('/Views/ViewAllArticles.php', $vars);
		
		parent::OnOutput();
	}
}
?>