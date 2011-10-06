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
			$check_code = !empty($_POST['check_code']) ? trim(htmlspecialchars($_POST['check_code'])) : null;
         }


     }

     protected function OnOutput()
     {
         $vars = array('user' => $this->user);

         $this->content = $this->View('/Views/ViewRegistration.php', $vars);

         parent::OnOutput();
     }
 }
