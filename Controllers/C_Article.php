<?php
class C_Article extends C_Page{
	
	private $id_article;
	private $article;
	private $comments;
	
	protected function OnInput()
	{
		parent::OnInput();
		$mArticle = M_Articles::Instance();
		$mComments = M_Comments::Instance();
		
		$this->id_article = !empty($_GET['id']) ? $_GET['id'] : null;
		$this->comments = $mComments->SelectAllComments( $this->id_article );
		
		if($this->IsGet())
		{	
			if(!$this->id_article)
			{
				header('Location: /');
				die();
			}
			
			$this->article = $mArticle->ViewArticle($this->id_article);
			
			if(count($this->article) == 0)
			{
				header('Location: /');
				die();
			}
			
			$this->article = $this->article[0];
			
			$this->title .= 'Статьи | ' . $this->article['title_article'];
		}
		
		if($this->IsPost())
		{	
			$result = $mArticle->DeleteArticle($this->id_article);
			
			//print_r($result);
			
			if(!$result)
				header('Location: /');
			else
				header('Location: /articles.html');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$vars = array( 'article' => $this->article, 'edit' => $mUsers->Can('EDITING_ARTICLES'), 'delete' => $mUsers->Can('DELETE_ARTICLES'), 'comments' => $this->comments, 'add_comment' => $mUsers->Can('ADD_COMMENT'), 'delete_comment' => $mUsers->Can('DELETE_COMMENT'), 'login' => $this->user['login'] );
		
		$this->content = $this->View('/Views/ViewArticle.php', $vars);
		
		parent::OnOutput();
	}
}
?>