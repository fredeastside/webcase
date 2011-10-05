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
     private $user;

     function __construct()
     {

     }

     protected function OnInput()
     {
         $mUsers = M_Users::Instance();
         $this->user = $mUsers->Get();

         parent::OnInput();

         if($this->IsPost())
         {
             die();
         }


     }

     protected function OnOutput()
     {
         $vars = array('user' => $this->user);

         $this->content = $this->View('/Views/ViewRegistration.php', $vars);

         parent::OnOutput();
     }
 }
