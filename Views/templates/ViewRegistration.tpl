{if !$user}
    {if !$is_registered}
    <form method="post" id="regform">
    <div class="registration">
    {if $errors}
        <h2 align="center" class="redstar">{$errors}</h2>
    {else}
        <h2 align="center">Регистрация нового пользователя.</h2>
    {/if}
        <table border="0" cellpadding="" cellspacing="8">
        <tr>
            <td><b>Логин:<span class="redstar">*</span></b></td>
            <td><input type="text" id="login" name="login" value="{$login}" /><br/>
                <span id="msg_login" class="msg_log">Введите логин.</span></td>
        </tr>
        <tr>
            <td><b>E-mail:<span class="redstar">*</span></b></td>
            <td><input type="text" id="email" name="email" value="{$email}" /><br/>
                <span id="msg_email" class="msg_log">Введите email.</span></td>
        </tr>
        <tr>
            <td><b>Пароль:<span class="redstar">*</span></b></td>
            <td><input type="password" id="password" name="password" /><br/>
                <span id="msg_password" class="msg_log">Введите пароль.</span></td>
        </tr>
        <tr>
            <td><b>Повтор пароля:<span class="redstar">*</span></b></td>
            <td><input type="password" id="repeat_password" name="repeat_password" /><br/>
                <span id="msg_repeat_password" class="msg_log">Введите повторный пароль.</span></td>
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
    </div>
    </form>
    {else}
    <h2 align="center">Регистрация нового пользователя прошла успешно!</h2>
    <p>Но это еще не всё!</p>
    <p>На указанный e-mail была выслана ссылка с подтверждающих кодом. Вам надо перейти по этой ссылке для завершения процесса регистрации.</p>
    <p><a href="/injustice/">Не пришло письмо подтверждения регистрации?</a></p>
    {/if}
{/if}