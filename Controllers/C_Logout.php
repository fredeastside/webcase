<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 23.09.11
 * Time: 12:02
 */
 class C_logout extends C_page{

     function __construct()
     {
         parent::__construct();
     }

     protected function OnInput()
     {
         $mUsers = M_Users::Instance();
         $mUsers->Logout();
		 
		 header('Location: /index.php');
     }
 }