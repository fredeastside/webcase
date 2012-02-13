<?php /* Smarty version Smarty-3.1.7, created on 2012-02-09 14:33:55
         compiled from "Z:\home\webcase\www\Views\templates\ViewRecover.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182644f33af2332f217-99262785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df3879c8328c465a54fdb9954c15a29347d8c44e' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewRecover.tpl',
      1 => 1328784349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182644f33af2332f217-99262785',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'found_user' => 0,
    'change_password' => 0,
    'user' => 0,
    'is_registered' => 0,
    'errors' => 0,
    'login_or_email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f33af2379022',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f33af2379022')) {function content_4f33af2379022($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['found_user']->value&&!$_smarty_tpl->tpl_vars['change_password']->value){?>
	<?php if (!$_smarty_tpl->tpl_vars['user']->value){?>
		<?php if (!$_smarty_tpl->tpl_vars['is_registered']->value){?>
		<div class="registration">
			<?php if ($_smarty_tpl->tpl_vars['errors']->value){?>
			<h2 align="center" class="redstar"><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</h2>
			<?php }else{ ?>
			<h2 align="center">Восстановление забытого пароля.</h2>
			<?php }?>
		<form method="post" id="regform">
		<table border="0" cellpadding="" cellspacing="8">
		<tr>
			<td><b>Логин или e-mail:<span class="redstar">*</span></b></td>
			<td><input type="text" id="login_or_email" name="login_or_email" value="<?php echo $_smarty_tpl->tpl_vars['login_or_email']->value;?>
" /><br/>
                <span id="msg_login_or_email" class="msg_log">Введите логин или пароль.</span></td>
		</tr>
		<tr>
			<td><img src="/Views/captcha/captcha.php" alt="код подтверждения" border="0"></td>
			<td><input type="text" id="check_code" name="captcha" style="width:125px; font-size:310%;" /><br/>
                <span id="msg_check_code" class="msg_log">Введите код подтверждения.</span></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="adm_button" value="Зарегистрироваться!" onclick="return Validation();" /></td>
		</tr>
		</table>
		</form>
		</div>
		<?php }else{ ?>
		<h2 align="center">Восстановление забытого пароля</h2>
		<p>На email выслана информация, необходимая для завершения процесса восстановления пароля.</p>
		<?php }?>
	<?php }?>
<?php }else{ ?>
<?php if (!$_smarty_tpl->tpl_vars['change_password']->value){?>
<div class="registration">
			<?php if ($_smarty_tpl->tpl_vars['errors']->value){?>
			<h2 align="center" class="redstar"><<?php ?>?php echo $errors; ?<?php ?>></h2>
			<?php }else{ ?>
			<h2 align="center">Введите новый пароль.</h2>
			<?php }?>
		<form method="post">
		<table border="0" cellpadding="" cellspacing="8">
		<tr>
			<td><b>Новый пароль:<span class="redstar">*</span></b></td>
			<td><input type="password" id="new_password" name="new_password" value="" /><span id="msg_new_password" class="msg_log"></span></td>
		</tr>
		<tr>
			<td><b>Повтор пароля:<span class="redstar">*</span></b></td>
			<td><input type="password" id="re_password" name="re_password" value="" /><span id="msg_re_password" class="msg_log"></span></td>
		</tr>
		<tr>
			<td><img src="/Views/captcha/captcha.php" alt="код подтверждения" border="0"></td>
			<td><input type="text" id="check_code" name="captcha" style="width:115px; font-size:310%;" /><span id="msg_check_code" class="msg_log"></span></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="adm_button" value="Зарегистрироваться!" onclick="return Validation();" /></td>
		</tr>
		</table>
		</form>
</div>
<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['change_password']->value){?>
<h2 align="center">Восстановление пароля завершено</h2>
<p>Воспользоваться новеньким паролем Вы можете на <a href="/login.html">этой</a> странице.</p>
<?php }?><?php }} ?>