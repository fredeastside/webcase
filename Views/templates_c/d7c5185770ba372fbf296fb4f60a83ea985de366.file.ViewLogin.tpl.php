<?php /* Smarty version Smarty-3.1.7, created on 2012-02-09 14:33:45
         compiled from "Z:\home\webcase\www\Views\templates\ViewLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108044f33aeedde8503-01142727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7c5185770ba372fbf296fb4f60a83ea985de366' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewLogin.tpl',
      1 => 1328787221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108044f33aeedde8503-01142727',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f33aeedf18f0',
  'variables' => 
  array (
    'errors' => 0,
    'login' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f33aeedf18f0')) {function content_4f33aeedf18f0($_smarty_tpl) {?><form method="post" id="regform">
<div class="authorization">
<?php if (!$_smarty_tpl->tpl_vars['errors']->value){?>
	<h2 align="center">Введите логин и пароль для входа на сайт.</h2>
<?php }else{ ?>
	<h2 align="center" style="color:#ff0000;">Неправильное имя пользователя или пароль!</h2>
<?php }?>
	<table border="0" cellpadding="" cellspacing="8">
    <tr>
		<td><b>Логин:</b></td>
		<td><input type="text" id="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" /><br/>
            <span id="msg_login" class="msg_log">Введите логин.</span></td>
	</tr>
    <tr>
		<td><b>Пароль:</b></td>
		<td><input type="password" id="password" name="password" /><br/>
            <span id="msg_password" class="msg_log">Введите пароль.</span></td>
	</tr>
    <tr>
		<td colspan="2"><input type="checkbox" name="remember" /> запомнить меня</td>
	</tr>
    <tr>
		<td colspan="2" align="center"><input type="submit" class="adm_button" value="Войти" onclick="return Validation();" /></td>
	</tr>
	</table>
</div>
</form>
<p align="center"><a href="/registration.html">Регистрация</a> | <a href="/recover.html">Забыли пароль?</a> | <a href="/injustice.html">Не пришло письмо подтверждения регистрации?</a></p><?php }} ?>