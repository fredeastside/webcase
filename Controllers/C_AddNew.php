<?php
class C_AddNew extends C_Page {
	
	private $id;
	private $date;
	
	function __construct()
	{
	
	}
	
	protected function OnInput()
	{
		parent::OnInput();
		
		$this->title .= 'Новости | Добавление новости.';
		$this->date = date('Y-m-d H:i:s');
		
		if($this->IsPost())
		{
			$title = !empty($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : null;
			$author = !empty($_POST['author']) ? trim(htmlspecialchars($_POST['author'])) : null;
			$date = !empty($_POST['date']) ? trim(htmlspecialchars($_POST['date'])) : null;
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
		
		$vars = array('add' => $mUsers->Can('ADD_NEWS'), 'date' => $this->date);
		
		$this->content = $this->View('/Views/ViewAddNew.php', $vars);
		parent::OnOutput();
	}
}
?>