<?php
class C_Javascript extends C_Page{
	private $articlesJs;
	private $mArticlesJs;
	private $num = 5; // количество  новостей на странице	
	
	protected function OnInput()
	{
	
		parent::OnInput();
	
		$this->mArticlesJs = M_Articles::Instance();
		
		$this->title .= 'Статьи | Javascript';
		
		$page = !empty($_GET['page']) ? htmlspecialchars(trim((int)$_GET['page'])) : 1;

		$this->pages_menu = $this->mArticlesJs->CreatePagesMenu($this->num, $page);		
		
		$this->articlesJs = $this->mArticlesJs->ViewAllTypedArticles('javascript', $this->num, $page);
		
		for($i = 0, $cnt = count($this->articlesJs); $i < $cnt; $i++)
		{
			$this->articlesJs[$i]['content_article'] = $this->doIntroDescription($i, $this->articlesJs[$i]['content_article'], 'article');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$vars = array('articles' => $this->articlesJs, 'add' => $mUsers->Can('ADD_ARTICLES'), 'pages_menu' => $this->pages_menu);
		
		$this->content = $this->View('ViewAllArticles', $vars);
		
		parent::OnOutput();
	}
}
?>
