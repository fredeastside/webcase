<?php if($user):
header('Location: /');
endif;
?>
<form method="post">
<div class="registration">
	<h2 align="center">Регистрация нового пользователя.</h2>
	<table border="0" cellpadding="" cellspacing="8">
    <tr>
		<td><b>Логин:</b></td>
		<td><input type="text" id="login" name="login" value="" /><span id="msg_login" class="msg_log"></span></td>
	</tr>
	<tr>
		<td><b>E-mail:</b></td>
		<td><input type="text" id="email" name="email" /><span id="msg_email" class="msg_log"></span></td>
	</tr>
	<tr>
		<td><b>Пароль:</b></td>
		<td><input type="password" id="password" name="password" /><span id="msg_password" class="msg_log"></span></td>
	</tr>
    <tr>
		<td><b>Повтор пароля:</b></td>
		<td><input type="password" id="repeat_password" name="repeat_password" /><span id="msg_repeat_password" class="msg_log"></span></td>
	</tr>
	<tr>
		<td><b>Проверочный код:</b></td>
		<td><input type="text" id="check_code" name="check_code" /><span id="msg_check_code" class="msg_log"></span></td>
	</tr>
    <tr>
		<td colspan="2" align="center"><input type="submit" class="adm_button" value="Зарегистрироваться!" onclick="return Validation();" /></td>
	</tr>
	</table>
</div>
</form>