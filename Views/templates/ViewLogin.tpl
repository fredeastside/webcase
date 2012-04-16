<form method="post" id="regform">
<div class="authorization">
{if !$errors}
	<h2 align="center">Введите логин и пароль для входа на сайт.</h2>
{else}
	<h2 align="center" style="color:#ff0000;">Неправильное имя пользователя или пароль!</h2>
{/if}
	<table border="0" cellpadding="" cellspacing="8">
    <tr>
		<td><b>Логин:</b></td>
		<td><input type="text" id="login" name="login" value="{$login}" /><br/>
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
<p align="center"><a href="/registration/">Регистрация</a> | <a href="/recover/">Забыли пароль?</a> | <a href="/injustice/">Не пришло письмо подтверждения регистрации?</a></p>