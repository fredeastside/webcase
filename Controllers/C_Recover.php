<?php
class C_Recover extends C_Page {
	
	private $login_or_email;
	
	protected function OnInput()
	{		
		parent::OnInput();
		
		$this->title .= 'Восстановление забытого пароля.';	
	}
	
	protected function OnOutput()
	{	
		$vars = array('user' => $this->user, 'login_or_email' => $this->login_or_email);
		
		$this->content = $this->View('/Views/ViewRecover.php', $vars);
		
		parent::OnOutput();
	}	
}
?>