<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 12.03.12
 * Time: 21:44
 */
class C_Menuitems extends C_Admin{

    private $menu_items;
    private $mMenu;

    protected function OnInput(){
        parent::OnInput();
        $this->title .= ' | Редактирование меню';
        $this->mMenu = M_Menu::Instance();

        if($this->IsGet()){
            $id_menu = $this->getRequest('arg','int+');
            $this->menu_items = $this->mMenu->getMenuItems($id_menu);
        }

        if($this->IsPost()){
             $title_menu = $this->getRequest('menu_item_title');
             $id_menu = $this->getRequest('arg','int+');
             $link = $this->getRequest('link');
             $parent_id = $this->getRequest('parent_id', 'int+');
             $this->mMenu->addNewMenuItem($id_menu, $title_menu, $link, $parent_id);

             header('Location: /menuitems/'.$id_menu.'/');
        }
    }

    protected function OnOutput(){
             $this->smarty->assign(array('title' => $this->title,
                                     'content' => $this->content,
                                     'menu_items' => $this->menu_items));
             $this->content = $this->smarty->fetch('admin/ViewAdminItemsMenu.tpl');
             parent::OnOutput();
    }
}
 
