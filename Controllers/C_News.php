<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 04.08.11
 * Time: 21:36
 * To change this template use File | Settings | File Templates.
 */
class C_News extends C_Page
{
    private $news;
    private $mNews;
	private $num = 5; // количество  новостей на странице
	private $pages_menu;

    protected function OnInput()
    {
        parent::OnInput();

        $this->mNews = M_News::Instance();

        $this->title .= 'Новости';
		
		$page = !empty($_GET['page']) ? htmlspecialchars(trim((int)$_GET['page'])) : 1;

		$this->pages_menu = $this->mNews->CreatePagesMenu($this->num, $page);
		
        $this->news = $this->mNews->ViewAllNews($this->num, $page);

        for($i = 0, $cnt = count($this->news); $i < $cnt; $i++)
        {
            $this->news[$i]['content_new'] = $this->doIntroDescription($this->news[$i]['content_new']);
        }
    }

    protected function OnOutput()
    {
		$mUsers = M_Users::Instance();
		
        $vars = array('news' => $this->news, 'add' => $mUsers->Can('ADD_NEWS'), 'pages_menu' => $this->pages_menu);

        $this->content = $this->View('ViewAllNews', $vars);

        parent::OnOutput();
    }
}

