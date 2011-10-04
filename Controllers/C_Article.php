<?php
class C_Article extends C_Page{
	
	private $id_article;
	private $article;
	
	protected function OnInput()
	{
		parent::OnInput();
		$mArticle = M_Articles::Instance();
		
		if($this->IsGet())
		{
			$this->id_article = !empty($_GET['id']) ? $_GET['id'] : null;
			
			if(!$this->id_article)
			{
				header('Location: /index.php');
				die();
			}
			
			$this->article = $mArticle->ViewArticle($this->id_article);
			
			if(count($this->article) == 0)
			{
				header('Location: /index.php');
				die();
			}
			
			$this->article = $this->article[0];
			
			$this->title .= 'Статьи | ' . $this->article['title_article'];
		}
		
		if($this->IsPost())
		{
			$this->id_article = !empty($_GET['id']) ? $_GET['id'] : null;
			
			$result = $mArticle->DeleteArticle($this->id_article);
			
			//print_r($result);
			
			if(!$result)
				header('Location: /index.php');
			else
				header('Location: /articles');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$vars = array('article' => $this->article, 'edit' => $mUsers->Can('EDITING_ARTICLES'), 'delete' => $mUsers->Can('DELETE_ARTICLES'));
		$this->content = $this->View('/Views/ViewArticle.php', $vars);
		
		parent::OnOutput();
	}
}
?>