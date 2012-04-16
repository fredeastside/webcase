<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 28.02.12
 * Time: 21:46
 */
 class C_Menu extends C_Admin{

     protected $menu;
     private $mMenu;

     protected function OnInput(){
         parent::OnInput();
         $this->title .= ' | Меню';

         $this->mMenu = M_Menu::Instance();

         $this->menu = $this->mMenu->getMenu();

         if($this->IsPost()){
             $title_menu = $this->getRequest('menu_title');

             $this->mMenu->addNewMenu($title_menu);

             header('Location: /menu/');
         }
     }
     protected function OnOutput(){
         $this->smarty->assign(array('title' => $this->title,
                                     'content' => $this->content,
                                     'menu' => $this->menu));
         $this->content = $this->smarty->fetch('admin/ViewAdminMenu.tpl');
         parent::OnOutput();
     }

     public function delete(){
         $this->mMenu = M_Menu::Instance();
         $id_menu = $this->getRequest('arg', 'int+');
         $this->mMenu->deleteMenu($id_menu);
         header('Location: /menu/');
     }
 }
