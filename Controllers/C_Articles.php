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

    protected function OnInput()
    {
        parent::OnInput();

        $this->mArticles = M_Articles::Instance();

        $this->title .= 'Статьи';

        $this->articles = $this->mArticles->ViewAllTypedArticles('all');

        for($i = 0, $cnt = count($this->articles); $i < $cnt; $i++)
        {
            $this->articles[$i]['content_article'] = $this->doIntroDescription($i, $this->articles[$i]['content_article'], 'article');
        }
    }

    protected function OnOutput()
    {
		$mUsers = M_Users::Instance();
		
        $vars = array('articles' => $this->articles, 'add' => $mUsers->Can('ADD_ARTICLES'));

        $this->content = $this->View('/Views/ViewAllArticles.php', $vars);

        parent::OnOutput();
    }
}
 
