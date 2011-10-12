<?php
class C_Recover extends C_Page {
	
	private $login_or_email;
	private $errors;
	private $is_registered;
	private $found_user;
	private $change_password;
	
	protected function OnInput()
	{		
		$mUsers = M_Users::Instance();
		parent::OnInput();
		
		$this->title .= 'Восстановление забытого пароля.';	
		
		$code = !empty($_GET['code']) ? htmlspecialchars(trim($_GET['code'])) : null;
		
         if($this->IsPost() && $this->user == null && $code == null)
         {
			$this->login_or_email = !empty($_POST['login_or_email']) ? htmlspecialchars(trim($_POST['login_or_email'])) : null;
			$captcha = !empty($_POST['captcha']) ? trim(htmlspecialchars($_POST['captcha'])) : null;
			
			$this->errors = $mUsers->RecoverPassword($this->login_or_email, $captcha);
			
				if(!$this->errors)
					$this->is_registered = true;
         }
		 
		 if($this->IsPost() && $this->user == null && $code != null)
		 {
			$new_password = !empty($_POST['new_password']) ? htmlspecialchars(trim($_POST['new_password'])) : null;
			$re_password = !empty($_POST['re_password']) ? htmlspecialchars(trim($_POST['re_password'])) : null;
			$captcha = !empty($_POST['captcha']) ? trim(htmlspecialchars($_POST['captcha'])) : null;
			
			if($mUsers->SearchForgetUsers($code))
			{
				$this->found_user = true;
			}
			
			if($new_password !== $re_password)
				$this->errors = 'Поля "Новый пароль" и "Повтор пароля" несоответствуют!';
			else
			{		
				$this->errors = $mUsers->ChangePassword($new_password, $captcha, $code);
				
				if(!$this->errors)
				{
					$this->change_password = true;
					$this->found_user = false;
				}
			}		
		 }
		 
		if($this->IsGet())
		{
			if($code)
			{
				if($mUsers->SearchForgetUsers($code))
				{
					$this->found_user = true;
				}
			}
		}
	}
	
	protected function OnOutput()
	{	
		$vars = array('user' => $this->user, 'login_or_email' => $this->login_or_email, 'errors' => $this->errors, 'is_registered' => $this->is_registered, 'found_user' => $this->found_user, 'change_password' => $this->change_password);
		
		$this->content = $this->View('/Views/ViewRecover.php', $vars);
		
		parent::OnOutput();
	}	
}
?>