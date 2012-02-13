<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 28.01.12
 * Time: 10:20
 */
 class C_Sitemap extends C_Page{

     private $mArticles;
     private $mNews;
     private $articles;
     private $news;
     private $php_articles;
     private $js_articles;
     private $sql_articles;

     protected function OnInput(){
         parent::OnInput();
         $this->title .= 'Карта сайта';
         $this->mArticles = M_Articles::Instance();
         $this->mNews = M_News::Instance();
         $this->news = $this->mNews->ViewAllNews();
         $this->articles = $this->mArticles->ViewAllTypedArticles('all');
         $this->php_articles = $this->mArticles->ViewAllTypedArticles('php');
         $this->js_articles = $this->mArticles->ViewAllTypedArticles('javascript');
         $this->sql_articles = $this->mArticles->ViewAllTypedArticles('sql');
     }
     protected function OnOutput(){

         $this->smarty->assign(array('articles' => $this->articles,
                       'php_articles' => $this->php_articles,
                       'js_articles' => $this->js_articles,
                       'sql_articles' => $this->sql_articles,
                       'news' => $this->news));

         $this->content = $this->smarty->fetch('ViewSiteMap.tpl');

         parent::OnOutput();
     }
 }
