<?php
class C_EditArticle extends C_Page {

	private $article;
	private $id_article;
	
	function __construct()
	{}
	
	protected function OnInput()
	{
		parent::OnInput();
		$mArticles = M_Articles::Instance();
		
		if($this->IsGet())
		{
			$this->id_article = !empty($_GET['id']) ? (int)$_GET['id'] : null;
			
			if(!$this->id_article)
			{
				header('Location: /');
				die();
			}
			
			$this->article = $mArticles->ViewArticle($this->id_article);
			
			if(count($this->article) == 0)
			{
				header('Location: /');
				die();
			}
			
			$this->article = $this->article[0];

			$this->title .= 'Статьи | Редактирование статьи : ' . $this->article['title_article'];
		}
		
		if($this->IsPost())
		{
			$id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
			$title = !empty($_POST['title']) ? trim($_POST['title']) : null;
			$author = !empty($_POST['author']) ? trim($_POST['author']) : null;
			$date = !empty($_POST['date']) ? trim($_POST['date']) : null;
			$content = !empty($_POST['content']) ? trim($_POST['content']) : null;
			
			$mArticles->UpdateArticle($id, $title, $author, $date, $content);
			
			header('Location: /article/' . $id . '.html');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
        $vars = array('article' => $this->article, 'edit' => $mUsers->Can('EDITING_NEWS'));
        $this->content = $this->View('/Views/ViewEditArticle.php', $vars);
		
		parent::OnOutput();
	}

}
?>