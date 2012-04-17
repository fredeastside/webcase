<?php /* Smarty version Smarty-3.1.7, created on 2012-02-21 21:46:11
         compiled from "Z:\home\webcase\www\Views\templates\ViewSiteMap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:222014f43e6738a5996-51984065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8655603f15525c4e1dae715bc378693a028c21e2' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewSiteMap.tpl',
      1 => 1328786743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '222014f43e6738a5996-51984065',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'news' => 0,
    'new' => 0,
    'articles' => 0,
    'article' => 0,
    'php_articles' => 0,
    'js_articles' => 0,
    'sql_articles' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f43e673c8614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f43e673c8614')) {function content_4f43e673c8614($_smarty_tpl) {?><div style="margin-bottom: 15px;">
    <ul>
        <li>Новости</li>
            <ul>
            <?php  $_smarty_tpl->tpl_vars['new'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new']->key => $_smarty_tpl->tpl_vars['new']->value){
$_smarty_tpl->tpl_vars['new']->_loop = true;
?>
                <li><a href="/news/<?php echo $_smarty_tpl->tpl_vars['new']->value['id_new'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['new']->value['title_new'];?>
</a></li>
            <?php } ?>
            </ul>
        <li>Статьи</li>
            <ul>
            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                <li><a href="/articles/<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['article']->value['title_article'];?>
</a></li>
            <?php } ?>
            </ul>
        <li>PHP</li>
            <ul>
            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['php_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                <li><a href="/articles/<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['article']->value['title_article'];?>
</a></li>
            <?php } ?>
            </ul>
        <li>JAVASCRIPT</li>
            <ul>
            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                <li><a href="/articles/<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['article']->value['title_article'];?>
</a></li>
            <?php } ?>
            </ul>
        <li>SQL</li>
            <ul>
            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sql_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                <li><a href="/articles/<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['article']->value['title_article'];?>
</a></li>
            <?php } ?>
            </ul>
    </ul>
</div><?php }} ?>