<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 04.08.11
 * Time: 21:36
 * To change this template use File | Settings | File Templates.
 */
require_once '/Models/M_News.php';

class C_News extends C_Page
{
    private $news;

    protected function OnInput()
    {
        parent::OnInput();

        $mNews = M_News::Instance();

        $this->title .= 'Новости';

        $this->news = $mNews->ViewAllNews();
    }

    protected function OnOutput()
    {
        $vars = array('news' => $this->news);

        $this->content = $this->View('/Views/ViewAllNews.php', $vars);

        parent::OnOutput();
    }
}

