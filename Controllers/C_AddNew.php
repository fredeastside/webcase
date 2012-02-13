<?php
class C_AddNew extends C_Page {
	
	private $id;
	private $date;

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
				header('Location: /');
			else
				header('Location: /new/' . $this->id . '.html');
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();

        $this->smarty->assign(array('add' => $mUsers->Can('ADD_NEWS'),
                                    'date' => $this->date));
		
		$this->content = $this->smarty->fetch('ViewAddNew.tpl');
        
		parent::OnOutput();
	}
}
?>
