<?php /* Smarty version Smarty-3.1.7, created on 2012-02-09 22:56:48
         compiled from "Z:\home\webcase\www\Views\templates\ViewEditArticle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:244914f3409e1d33cd0-49406578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15b35a4cfeb83c0c66108c8d496c0db105a91559' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewEditArticle.tpl',
      1 => 1328817393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244914f3409e1d33cd0-49406578',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f3409e203e4a',
  'variables' => 
  array (
    'edit' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f3409e203e4a')) {function content_4f3409e203e4a($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['edit']->value){?>
<form method="post">
<table border="0">
    <tr>
        <td>Заголовок:</td>
        <td><input type="text" name="title" size="80" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['title_article'];?>
" /></td>
    </tr>
    <tr>
        <td>Автор:</td>
        <td><input type="text" name="author" size="60" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['author_article'];?>
" /></td>
    </tr>
    <tr>
        <td>Дата:</td>
        <td><input type="text" name="date" size="20" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['date_article'];?>
" /></td>
    </tr>
    <tr>
        <td colspan="2"><textarea name="content" id="editart" cols="90" rows="30" ><?php echo $_smarty_tpl->tpl_vars['article']->value['content_article'];?>
</textarea></td>
        <script type="text/javascript">CKEDITOR.replace('editart');</script>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="adm_button" value="Сохранить" /></td>
    </tr>
</table>
</form>
<?php }?><?php }} ?>