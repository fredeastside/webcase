<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 20.02.12
 * Time: 21:30
 */
 class C_Admin extends C_Page{

     public $admin_menu;

     protected function OnInput(){
         parent::OnInput();

         $this->title .= 'Панель управления';

         $this->admin_menu = '<ul id="navigation">';
         $links = array('/menu/' => 'Меню',
                        '/staticpages/' => 'Статические страницы',
                        '/modules/' => 'Модули',
                        '/settings/' => 'Настройки'
                        );

         foreach($links as $link => $title){
             if($_SERVER['REQUEST_URI'] === $link)
                 $this->admin_menu .= '<li><span class="active">'.$title.'</span></li>';
             else
                 $this->admin_menu .= '<li><a href="'.$link.'">'.$title.'</a></li>';
         }

         $this->admin_menu .= '</ul>';
     }

     protected function OnOutput(){
         $this->smarty->assign(array('title' => $this->title,
                                     'content' => $this->content,
                                     'admin_menu' => $this->admin_menu));
         $this->smarty->display('admin/ViewAdmin.tpl');
         //parent::OnOutput();
     }
 }
