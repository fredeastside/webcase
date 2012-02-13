{if !$found_user and !$change_password}
	{if !$user}
		{if !$is_registered}
		<div class="registration">
			{if $errors}
			<h2 align="center" class="redstar">{$errors}</h2>
			{else}
			<h2 align="center">Восстановление забытого пароля.</h2>
			{/if}
		<form method="post" id="regform">
		<table border="0" cellpadding="" cellspacing="8">
		<tr>
			<td><b>Логин или e-mail:<span class="redstar">*</span></b></td>
			<td><input type="text" id="login_or_email" name="login_or_email" value="{$login_or_email}" /><br/>
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
		{else}
		<h2 align="center">Восстановление забытого пароля</h2>
		<p>На email выслана информация, необходимая для завершения процесса восстановления пароля.</p>
		{/if}
	{/if}
{else}
{if !$change_password}
<div class="registration">
			{if $errors}
			<h2 align="center" class="redstar"><?php echo $errors; ?></h2>
			{else}
			<h2 align="center">Введите новый пароль.</h2>
			{/if}
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
{/if}
{/if}
{if $change_password}
<h2 align="center">Восстановление пароля завершено</h2>
<p>Воспользоваться новеньким паролем Вы можете на <a href="/login.html">этой</a> странице.</p>
{/if}