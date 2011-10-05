<?php
class C_EditNew extends C_Page {

	private $new;
	private $id_new;
	
	function __construct()
	{}
	
	protected function OnInput()
	{
		parent::OnInput();
		$mNews = M_News::Instance();
		
		if($this->IsGet())
		{
			$this->id_new = !empty($_GET['id']) ? (int)$_GET['id'] : null;
			
			if(!$this->id_new)
			{
				header('Location: /');
				die();
			}
			
			$this->new = $mNews->ViewNew($this->id_new);
			
			if(count($this->new) == 0)
			{
				header('Location: /');
				die();
			}
			
			$this->new = $this->new[0];

			$this->title .= 'Новости | Редактирование новости : ' . $this->new['title_new'];
		}
		
		if($this->IsPost())
		{
			$id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
			$title = !empty($_POST['title']) ? trim($_POST['title']) : null;
			$author = !empty($_POST['author']) ? trim($_POST['author']) : null;
			$date = !empty($_POST['date']) ? trim($_POST['date']) : null;
			$content = !empty($_POST['content']) ? trim($_POST['content']) : null;
			
			$mNews->UpdateNew($id, $title, $author, $date, $content);
			
			header('Location: /new/' . $id . '.html');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
        $vars = array('new' => $this->new, 'edit' => $mUsers->Can('EDITING_NEWS'));
        $this->content = $this->View('/Views/ViewEditNew.php', $vars);
		
		parent::OnOutput();
	}

}
?>