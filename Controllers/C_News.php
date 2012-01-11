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

        /*require_once '/Controllers/simple_html_dom.php';

        $html_content_links = file_get_html('http://soft.mail.ru/pressrl_list.php?cat=15');

        foreach($html_content_links->find('p.news-title a') as $element)
        {
            $html_content = file_get_html('http://soft.mail.ru/' . $element->href);

            foreach($html_content->find('h1.article-header') as $e)
                $title = $e->innertext;

            foreach($html_content->find('p.article-announce') as $e)
                $content = '<p>' . $e->innertext . '</p>';

            foreach($html_content->find('div.article-body') as $e)
                $content .= $e->innertext;

            break;
        }
        echo iconv('windows-1251', 'utf-8', $title) . '<br/>';
        echo iconv('windows-1251', 'utf-8', $content);
        /* ------------------------------------------------------- */
		
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

        $this->content = $this->View('/Views/ViewAllNews.php', $vars);

        parent::OnOutput();
    }
}

