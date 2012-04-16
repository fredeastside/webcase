<?php
class C_Php extends C_Page{
	private $articlesPhp;
	private $mArticlesPhp;
	private $num = 5; // количество  новостей на странице	
	
	protected function OnInput()
	{
		parent::OnInput();
		
		$this->mArticlesPhp = M_Articles::Instance();
		
		$this->title .= 'Статьи | PHP';
		
		$page = $this->getRequest('page', 'int+') ? $this->getRequest('page', 'int+') : 1;

		$this->pages_menu = $this->mArticlesPhp->CreatePagesMenu($this->num, $page);		
		
		$this->articlesPhp = $this->mArticlesPhp->ViewAllTypedArticles('php', $this->num, $page);
		
		for($i = 0, $cnt = count($this->articlesPhp); $i < $cnt; $i++)
		{
			$this->articlesPhp[$i]['content_article'] = $this->doIntroDescription($this->articlesPhp[$i]['content_article']);
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$this->smarty->assign(array('articles' => $this->articlesPhp,
                      'add' => $mUsers->Can('ADD_ARTICLES'),
                      'pages_menu' => $this->pages_menu));
		
		$this->content = $this->smarty->fetch('ViewAllArticles.tpl');
		
		parent::OnOutput();
	}
}
?>
