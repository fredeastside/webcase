<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 21.09.11
 * Time: 21:21
 */
?>
<form method="post">
<div class="authorization">
	<h4 align="center">Введите логин и пароль для входа на сайт.</h4>
	<table border="0" cellpadding="" cellspacing="10">
    <tr>
		<td><b>Логин:</b></td>
		<td><input type="text" name="login" value="<?php echo $login; ?>" /></td>
	</tr>
    <tr>
		<td><b>Пароль:</b></td>
		<td><input type="password" name="password" /></td>
	</tr>
    <tr>
		<td colspan="2"><input type="checkbox" name="remember" /> запомнить меня</td>
	</tr>
    <tr>
		<td colspan="2" align="right"><input type="submit" value="Войти" /></td>
	</tr>
	</table>
</div>
</form>
 
