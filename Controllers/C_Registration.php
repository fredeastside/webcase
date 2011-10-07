<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 05.10.11
 * Time: 22:51
 */
 class C_Registration extends C_Page {

     private $login;
     private $email;
     private $password;
	 private $is_registered;
	 private $errors;

     function __construct()
     {

     }

     protected function OnInput()
     {
         $mUsers = M_Users::Instance();
         $this->user = $mUsers->Get();

         parent::OnInput();
		 
		 $this->title .= 'Регистрация на сайте.';

         if($this->IsPost())
         {
			$this->login = !empty($_POST['login']) ? trim(htmlspecialchars($_POST['login'])) : null;
			$this->email = !empty($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : null;
			$this->password = !empty($_POST['password']) ? trim(htmlspecialchars($_POST['password'])) : null;
			$repeat_password = !empty($_POST['repeat_password']) ? trim(htmlspecialchars($_POST['repeat_password'])) : null;
			$captcha = !empty($_POST['captcha']) ? trim(htmlspecialchars($_POST['captcha'])) : null;
			
			if($this->password !== $repeat_password)
				$this->errors = 'Поля "Пароль" и "Повтор пароля" несоответствуют!';
			else
			{
				$this->errors = $mUsers->Registration($this->login, $this->email, $this->password, $captcha);
			
				if(!$this->errors)
					$this->is_registered = true;
			}
         }


     }

     protected function OnOutput()
     {
         $vars = array('user' => $this->user, 'is_registered' => $this->is_registered, 'errors' => $this->errors, 'login' => $this->login, 'email' => $this->email);
		
         $this->content = $this->View('/Views/ViewRegistration.php', $vars);

         parent::OnOutput();
     }
 }
