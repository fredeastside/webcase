<?php
class C_Confirm extends C_Page {
	
	private $not_active_user;
	private $found_user;
	private $search;
	
	protected function OnInput()
	{
		$mUsers = M_Users::Instance();
		
		parent::OnInput();
		
		$this->title .= 'Подтверждение регистрации на сайте.';
		
		if($this->IsGet())
		{
			$code = !empty($_GET['code']) ? htmlspecialchars(trim($_GET['code'])) : null;
			
			if($code)
			{
				$this->search = $mUsers->SearchUsers($code);
				
				if($this->search)
				{
					$this->found_user = $mUsers->UpdateNotActiveUser($code);
				}
			}
		}
	}
	
	protected function OnOutput()
	{	
		$vars = array('found_user' => $this->found_user);
		
		$this->content = $this->View('/Views/ViewConfirm.php', $vars);
		parent::OnOutput();
	}
}
?>