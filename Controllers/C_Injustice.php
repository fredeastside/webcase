<?php
class C_Injustice extends C_Page {

	protected function OnInput()
	{		
		parent::OnInput();
		
		$this->title .= 'Не пришло письмо подтверждения регистрации?';	
	}
	
	protected function OnOutput()
	{	
		$this->smarty->assign(array('user' => $this->user));
		
		$this->content = $this->smarty->fetch('ViewInjustice.tpl');

		parent::OnOutput();
	}	
}
?>
