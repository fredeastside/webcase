<?php
class C_AddNew extends C_Page {
	
	private $id;
	
	function __construct()
	{
	
	}
	
	protected function OnInput()
	{
		parent::OnInput();
		
		$this->title .= 'Новости | Добавление новости.';
		
		if($this->IsPost())
		{
			$title = !empty($_POST['title']) ? trim($_POST['title']) : null;
			$author = !empty($_POST['author']) ? trim($_POST['author']) : null;
			$date = !empty($_POST['date']) ? trim($_POST['date']) : null;
			$content = !empty($_POST['content']) ? trim($_POST['content']) : null;
			
			$mNew = M_News::Instance();
			
			$this->id = $mNew->AddNew($title, $date, $author, $content);
			
			if(!$this->id)
				header('Location: index.php');
			else
				header('Location: index.php?c=new&id=' . $this->id);
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$vars = array('add' => $mUsers->Can('ADD_NEWS'));
		
		$this->content = $this->View('/Views/ViewAddNew.php', $vars);
		parent::OnOutput();
	}
}
?>