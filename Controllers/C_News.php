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

    protected function OnInput()
    {
        parent::OnInput();

        $this->mNews = M_News::Instance();

        $this->title .= 'Новости';

        $this->news = $this->mNews->ViewAllNews();

        for($i = 0, $cnt = count($this->news); $i < $cnt; $i++)
        {
            $this->news[$i]['content_new'] = $this->doIntroDescription($i, $this->news[$i]['content_new'], 'new');
        }
    }

    protected function OnOutput()
    {
		$mUsers = M_Users::Instance();
		
        $vars = array('news' => $this->news);

        $this->content = $this->View('/Views/ViewAllNews.php', $vars);

        parent::OnOutput();
    }
}

