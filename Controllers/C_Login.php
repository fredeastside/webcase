<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 21.09.11
 * Time: 21:24
 */
 class C_Login extends C_page{

      private $login;

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
             if($mUsers->Login($_POST['login'], $_POST['password'], isset($_POST['remember'])))
             {
                 header('Location: /');
                 die();
             }
             $this->login = $_POST['login'];
         }
     }

     protected function OnOutput()
     {
         $vars = array('login' => $this->login);
         $this->content = $this->View('Views/ViewLogin.php', $vars);
         parent::OnOutput();
     }
 }
