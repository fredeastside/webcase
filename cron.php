<?php
	require_once 'Models/M_SQL.php';
	require_once 'Models/M_News.php';
	require_once 'Models/M_Users.php';
	require_once 'Application/simple_html_dom.php';
		
		$mNews = M_News::Instance();
		$mUsers = M_Users::Instance();
		$title_last_new = $mNews->SelectTitleLastNew();
		
        $html_content_links = file_get_html('http://soft.mail.ru/pressrl_list.php?cat=15');

        foreach($html_content_links->find('p.news-title a') as $element)
        {
            $html_content = file_get_html('http://soft.mail.ru/' . $element->href);

            foreach($html_content->find('h1.article-header') as $e)
                $title = $e->innertext;
				
			if(iconv('windows-1251', 'utf-8', $title) === $title_last_new)
				break;

            foreach($html_content->find('p.article-announce') as $e)
                $content = '<p>' . $e->innertext . '</p>';

            foreach($html_content->find('div.article-body') as $e)
                $content .= $e->innertext;

            break;
        }
		
		//echo iconv('windows-1251', 'utf-8', $title) . '<br/>';
		//echo $title . '<br/>';
		//echo iconv('windows-1251', 'utf-8', $content);
		//echo $content;
		
		if($content)
		{
			$mNews->AddNew(iconv('windows-1251', 'utf-8', $title), date('Y-m-d H:i:s'), '<a href="http://soft.mail.ru/pressrl_list.php?cat=15">News for developers</a>', iconv('windows-1251', 'utf-8', $content));
		}
?>
