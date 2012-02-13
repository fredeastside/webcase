<?php /* Smarty version Smarty-3.1.7, created on 2012-02-09 14:49:00
         compiled from "Z:\home\webcase\www\Views\templates\ViewSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:934f33b2ac22cdd4-24902944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8951335175ed396d58e6cbdf1071df5ac4b90e4c' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewSearch.tpl',
      1 => 1328786290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '934f33b2ac22cdd4-24902944',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_result' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f33b2ac9d379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f33b2ac9d379')) {function content_4f33b2ac9d379($_smarty_tpl) {?><?php if (!is_array($_smarty_tpl->tpl_vars['search_result']->value)){?>
<h2><?php echo $_smarty_tpl->tpl_vars['search_result']->value;?>
</h2>
<?php }else{ ?>
<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['search_result']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
<div style="margin-bottom: 15px;">
 <h3>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['number']==1){?>
		<a href="/article/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</a>
	<?php }else{ ?>
		<a href="/new/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</a>
	<?php }?>
</h3>
     <p><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</p>
</div>
<?php } ?>
<?php }?><?php }} ?>