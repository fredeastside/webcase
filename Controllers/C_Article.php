<?php
class C_Article extends C_Page{
	
	private $id_article;
	private $article;
	
	protected function OnInput()
	{
		parent::OnInput();
		
		if($this->IsGet())
		{
			$mArticle = M_Articles::Instance();
			
			$this->id_article = !empty($_GET['id']) ? $_GET['id'] : null;
			
			if(!$this->id_article)
			{
				header('Location: index.php');
				die();
			}
			
			$this->article = $mArticle->ViewArticle($this->id_article);
			
			if(count($this->article) == 0)
			{
				header('Location: index.php');
				die();
			}
			
			$this->article = $this->article[0];
			
			$this->title .= 'Статьи | ' . $this->article['title_article'];
		}
		else
		{
			header('Location index.php');
			die();
		}
	}
	
	protected function OnOutput()
	{
		$vars = array('article' => $this->article);
		$this->content = $this->View('/Views/ViewArticle.php', $vars);
		
		parent::OnOutput();
	}
}
?>