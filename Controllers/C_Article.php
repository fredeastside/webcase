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
			
			$this->id_article = $_GET['id'];
			
			$this->article = $mArticle->ViewArticle($this->id_article);
			
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