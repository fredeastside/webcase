<?php
class C_Search extends C_Page{
	
	private $search_result;
	
	function __construct()
	{}
	
	protected function OnInput()
	{
		$mSearch = M_Search::Instance();
		$mNews = M_News::Instance();
		
		parent::OnInput();
		
		$this->title .= 'Поиск на сайте';
		
		if($this->IsPost())
		{
			$search = !empty($_POST['search']) ? htmlspecialchars(trim($_POST['search'])) : null;
			
			$this->search_result = $mSearch->Search($search);
			
			if(is_array($this->search_result))
			{
				for($i = 0, $cnt = count($this->search_result); $i < $cnt; $i++)
				{
					$this->search_result[$i]['content'] = $this->doIntroDescription($this->search_result[$i]['content']);
				}
			}
		}
		
	}
	
	protected function OnOutput()
	{
		$vars = array('search_result' => $this->search_result);
		
		$this->content = $this->View('ViewSearch', $vars);
		
		parent::OnOutput();
	}
}
?>
