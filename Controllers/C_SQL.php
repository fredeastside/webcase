<?php
class C_Sql extends C_Page{
	private $articlesSql;
	private $mArticlesSql;
	private $num = 5; // количество  новостей на странице	
	
	protected function OnInput()
	{
	
		parent::OnInput();
	
		$this->mArticlesSql = M_Articles::Instance();
		
		$this->title .= 'Статьи | SQL';
		
		$page = !empty($_GET['page']) ? htmlspecialchars(trim((int)$_GET['page'])) : 1;

		$this->pages_menu = $this->mArticlesSql->CreatePagesMenu($this->num, $page);		
		
		$this->articlesSql = $this->mArticlesSql->ViewAllTypedArticles('sql', $this->num, $page);
		
		for($i = 0, $cnt = count($this->articlesSql); $i < $cnt; $i++)
		{
			$this->articlesSql[$i]['content_article'] = $this->doIntroDescription($i, $this->articlesSql[$i]['content_article'], 'article');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$vars = array('articles' => $this->articlesSql, 'add' => $mUsers->Can('ADD_ARTICLES'), 'pages_menu' => $this->pages_menu);
		
		$this->content = $this->View('/Views/ViewAllArticles.php', $vars);
		
		parent::OnOutput();
	}
}
?>