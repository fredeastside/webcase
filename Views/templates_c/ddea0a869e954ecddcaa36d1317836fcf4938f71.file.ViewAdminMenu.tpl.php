<?php /* Smarty version Smarty-3.1.7, created on 2012-03-22 16:19:47
         compiled from "Z:\home\webcase\www\Views\templates\admin\ViewAdminMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105984f4d2289713400-33607836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddea0a869e954ecddcaa36d1317836fcf4938f71' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\admin\\ViewAdminMenu.tpl',
      1 => 1332422379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105984f4d2289713400-33607836',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f4d228971858',
  'variables' => 
  array (
    'menu' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4d228971858')) {function content_4f4d228971858($_smarty_tpl) {?><table>
    <tr>
        <th>Название меню</th>
        <th>Макрос меню</th>
        <th class="td_img">Редактировать</th>
        <th class="td_img">Удалить</th>
    </tr>
<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['link']->value['title_menu'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['link']->value['macros'];?>
</td>
    <td class="td_img"><a href="/menuitems/<?php echo $_smarty_tpl->tpl_vars['link']->value['id_menu'];?>
/"><img src="/Views/images/admin_red.png"></a></td>
    <td class="td_img"><a href="/menu/delete/<?php echo $_smarty_tpl->tpl_vars['link']->value['id_menu'];?>
/"><img src="/Views/images/admin_del.png"></a></td>
</tr>
<?php } ?>
</table>
<form method="post">
Добавить новое меню <input type="text" name="menu_title" value="" /><br/>
    <input type="submit" value="Добавить">
</form><?php }} ?>