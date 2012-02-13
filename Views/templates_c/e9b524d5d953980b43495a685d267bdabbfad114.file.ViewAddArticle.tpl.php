<?php /* Smarty version Smarty-3.1.7, created on 2012-02-09 20:54:42
         compiled from "Z:\home\webcase\www\Views\templates\ViewAddArticle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22054f34086225fd42-41950491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9b524d5d953980b43495a685d267bdabbfad114' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewAddArticle.tpl',
      1 => 1328730673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22054f34086225fd42-41950491',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'add' => 0,
    'date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f34086241e28',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f34086241e28')) {function content_4f34086241e28($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['add']->value){?>
<h2>Добавить статью</h2>
<form method="post"> 
<table border="0" cellpadding="2" cellspacing="5"> 
<tr>
	<td><b>Заголовок:</b></td>
	<td><input type="text" class="edit_content" name="title" size="80" /></td>
</tr>
<tr>
	<td><b>Автор:</b></td>
	<td><input type="text" class="edit_content" name="author" size="60" /></td>
</tr>
<tr>
	<td><b>Дата:</b></td>
	<td><input type="text" class="edit_content" name="date" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" size="20" /></td>
</tr>
<tr>
	<td><b>Раздел:</b></td>
	<td>
		<select name="section">
			<option selected value="all">Статьи</option>
			<option selected value="php">PHP</option>
			<option selected value="javascript">JAVASCRIPT</option>
			<option selected value="sql">SQL</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2"><textarea name="content" cols="90" rows="30" ></textarea></td>
</tr>
</table>
<p align="center"><input type="submit" class="adm_button" value="Сохранить" /></p>
</form>
<?php }?><?php }} ?>