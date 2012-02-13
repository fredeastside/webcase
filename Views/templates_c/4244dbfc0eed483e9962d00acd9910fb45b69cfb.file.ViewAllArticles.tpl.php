<?php /* Smarty version Smarty-3.1.7, created on 2012-02-08 22:34:57
         compiled from "Z:\home\webcase\www\Views\templates\ViewAllArticles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211334f32ce61bb43e2-51013925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4244dbfc0eed483e9962d00acd9910fb45b69cfb' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewAllArticles.tpl',
      1 => 1328729692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211334f32ce61bb43e2-51013925',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'articles' => 0,
    'article' => 0,
    'add' => 0,
    'pages_menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f32ce6200d36',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f32ce6200d36')) {function content_4f32ce6200d36($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
<div style="margin-bottom: 15px;">
 <h3><a href="/article/<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['article']->value['title_article'];?>
</a></h3>
     <p><?php echo $_smarty_tpl->tpl_vars['article']->value['content_article'];?>
</p>
</div>
<?php } ?>
<?php if ($_smarty_tpl->tpl_vars['add']->value){?>
<form method="post">
    <p align="center"><a href="/addarticle.html"><input type="button" class="adm_button" value="Добавить" /></a></p>
</form>
<?php }?>
<div class="paginator">
<?php echo $_smarty_tpl->tpl_vars['pages_menu']->value;?>

</div>
 
<?php }} ?>