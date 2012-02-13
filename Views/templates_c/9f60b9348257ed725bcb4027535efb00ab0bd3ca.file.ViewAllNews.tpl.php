<?php /* Smarty version Smarty-3.1.7, created on 2012-02-08 22:34:54
         compiled from "Z:\home\webcase\www\Views\templates\ViewAllNews.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118644f30290bd3cfc4-37647871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f60b9348257ed725bcb4027535efb00ab0bd3ca' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewAllNews.tpl',
      1 => 1328729579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118644f30290bd3cfc4-37647871',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f30290be8efc',
  'variables' => 
  array (
    'news' => 0,
    'new' => 0,
    'add' => 0,
    'pages_menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f30290be8efc')) {function content_4f30290be8efc($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['new'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new']->key => $_smarty_tpl->tpl_vars['new']->value){
$_smarty_tpl->tpl_vars['new']->_loop = true;
?>
<div style="margin-bottom: 15px;">
<h3>
	<a href="/new/<?php echo $_smarty_tpl->tpl_vars['new']->value['id_new'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['new']->value['title_new'];?>
</a>
</h3>
<p><?php echo $_smarty_tpl->tpl_vars['new']->value['content_new'];?>
</p>
</div>
<?php } ?>
<?php if ($_smarty_tpl->tpl_vars['add']->value){?>
<form method="post">
    <p align="center"><a href="/addnew.html"><input type="button" class="adm_button" value="Добавить" /></a></p>
</form>
<?php }?>
<div class="paginator">
<?php echo $_smarty_tpl->tpl_vars['pages_menu']->value;?>

</div><?php }} ?>