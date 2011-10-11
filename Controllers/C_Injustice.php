<?php
class C_Injustice extends C_Page {

	protected function OnInput()
	{		
		parent::OnInput();
		
		$this->title .= 'Не пришло письмо подтверждения регистрации?';	
	}
	
	protected function OnOutput()
	{	
		$vars = array('user' => $this->user);
		
		$this->content = $this->View('/Views/ViewInjustice.php', $vars);
		parent::OnOutput();
	}	
}
?>