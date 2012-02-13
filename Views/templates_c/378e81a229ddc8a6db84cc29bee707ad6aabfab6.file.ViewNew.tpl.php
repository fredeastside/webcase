<?php /* Smarty version Smarty-3.1.7, created on 2012-02-10 21:50:27
         compiled from "Z:\home\webcase\www\Views\templates\ViewNew.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195094f33ae9b1738c8-44064212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '378e81a229ddc8a6db84cc29bee707ad6aabfab6' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewNew.tpl',
      1 => 1328899823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195094f33ae9b1738c8-44064212',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f33ae9b78914',
  'variables' => 
  array (
    'new' => 0,
    'edit' => 0,
    'delete' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f33ae9b78914')) {function content_4f33ae9b78914($_smarty_tpl) {?><h2><?php echo $_smarty_tpl->tpl_vars['new']->value['title_new'];?>
</h2>
<p class="small_text"><b>Автор: </b><?php echo $_smarty_tpl->tpl_vars['new']->value['author_new'];?>
<br/>
<b>Дата: </b><?php echo $_smarty_tpl->tpl_vars['new']->value['date_new'];?>
</p>
<?php echo $_smarty_tpl->tpl_vars['new']->value['content_new'];?>

<?php if ($_smarty_tpl->tpl_vars['edit']->value){?>
<table border="0">
    <tr>
        <td>
            <a href="/editnew/<?php echo $_smarty_tpl->tpl_vars['new']->value['id_new'];?>
.html"><input type="button" class="adm_button" value="Редактировать"/></a>
        </td>
		<?php if ($_smarty_tpl->tpl_vars['delete']->value){?>
        <td>
            <form method="post">
                <input type="submit" class="adm_button" value="Удалить" />
            </form>
        </td>
		<?php }?>
    </tr>
</table>
<?php }?>
<?php }} ?>