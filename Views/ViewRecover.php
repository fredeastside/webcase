	<div class="registration">
	<h2 align="center">Восстановление забытого пароля.</h2>
	<form method="post">
	<table border="0" cellpadding="" cellspacing="8">
    <tr>
		<td><b>Логин или e-mail:<span class="redstar">*</span></b></td>
		<td><input type="text" id="login_or_email" name="login_or_email" value="<?php echo $login_or_email;?>" /><span id="msg_login_or_email" class="msg_log"></span></td>
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