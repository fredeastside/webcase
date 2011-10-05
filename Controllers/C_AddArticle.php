<?php
class C_AddArticle extends C_Page {
	
	private $id;
	private $date;
	
	function __construct()
	{
	
	}
	
	protected function OnInput()
	{
		parent::OnInput();
		
		$this->title .= 'Статьи | Добавление статьи.';
		$this->date = date('Y-m-d H:i:s');
		
		if($this->IsPost())
		{
			$title = !empty($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : null;
			$author = !empty($_POST['author']) ? trim(htmlspecialchars($_POST['author'])) : null;
			$date = !empty($_POST['date']) ? trim(htmlspecialchars($_POST['date'])) : null;
			$content = !empty($_POST['content']) ? trim($_POST['content']) : null;
			$section = !empty($_POST['section']) ? trim(htmlspecialchars($_POST['section'])) : null;
			
			$mArticle = M_Articles::Instance();
			
			$this->id = $mArticle->AddArticle($title, $date, $author, $content, $section);
			
			if(!$this->id)
				header('Location: /');
			else
				header('Location: /article/' . $this->id . '.html');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$vars = array('add' => $mUsers->Can('ADD_ARTICLES'), 'date' => $this->date);
		
		$this->content = $this->View('/Views/ViewAddArticle.php', $vars);
		parent::OnOutput();
	}
}
?>