<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 07.08.11
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */
class C_Articles extends C_Page
{
    private $mArticles;
    private $articles;
	private $num = 5; // количество  новостей на странице

    protected function OnInput()
    {
        parent::OnInput();

        $this->mArticles = M_Articles::Instance();

        $this->title .= 'Статьи';
		
		$page = !empty($_GET['page']) ? htmlspecialchars(trim((int)$_GET['page'])) : 1;

		$this->pages_menu = $this->mArticles->CreatePagesMenu($this->num, $page);
		
        //$this->news = $this->mNews->ViewAllNews($this->num, $page);

        $this->articles = $this->mArticles->ViewAllTypedArticles('all', $this->num, $page);

        for($i = 0, $cnt = count($this->articles); $i < $cnt; $i++)
        {
            $this->articles[$i]['content_article'] = $this->doIntroDescription($this->articles[$i]['content_article']);
        }
    }

    protected function OnOutput()
    {
		$mUsers = M_Users::Instance();
		
        $vars = array('articles' => $this->articles, 'add' => $mUsers->Can('ADD_ARTICLES'), 'pages_menu' => $this->pages_menu);

        $this->content = $this->View('/Views/ViewAllArticles.php', $vars);

        parent::OnOutput();
    }
}
 
