<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 21.09.11
 * Time: 21:24
 */
 class C_Login extends C_Page{

      private $login;
	  private $errors;

     function __construct()
     {
         parent::__construct();
         $this->login = '';
     }

     protected function OnInput()
     {
         $mUsers = M_Users::Instance();
         $mUsers->Logout();
         parent::OnInput();
		 
		 $this->title .= 'Авторизация';
		 
         if($this->IsPost())
         {
			 $this->login = !empty($_POST['login']) ? trim(htmlspecialchars($_POST['login'])) : null;
			 $password = !empty($_POST['password']) ? trim(htmlspecialchars($_POST['password'])) : null;
			 $remember = !empty($_POST['remember']) ? trim(htmlspecialchars($_POST['remember'])) : null;
			 
             if($mUsers->Login($this->login, $password, isset($remember)))
             {
                 header('Location: /');
                 die();
             }
			 else
				$this->errors = true;
			 
             $this->login = $_POST['login'];
         }
     }

     protected function OnOutput()
     {
         $this->smarty->assign(array('login' => $this->login, 'errors' => $this->errors));

         $this->content = $this->smarty->fetch('ViewLogin.tpl');
         
         parent::OnOutput();
     }
 }
