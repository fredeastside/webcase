<?php /* Smarty version Smarty-3.1.7, created on 2012-02-21 22:36:50
         compiled from "Z:\home\webcase\www\Views\templates\ViewRegistration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322014f33b38adc1770-05938912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '475f7df915175b6d25572b78af2038576b9bfb4f' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewRegistration.tpl',
      1 => 1329852703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322014f33b38adc1770-05938912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f33b38b534a1',
  'variables' => 
  array (
    'user' => 0,
    'is_registered' => 0,
    'errors' => 0,
    'login' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f33b38b534a1')) {function content_4f33b38b534a1($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['user']->value){?>
    <?php if (!$_smarty_tpl->tpl_vars['is_registered']->value){?>
    <form method="post" id="regform">
    <div class="registration">
    <?php if ($_smarty_tpl->tpl_vars['errors']->value){?>
        <h2 align="center" class="redstar"><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</h2>
    <?php }else{ ?>
        <h2 align="center">Регистрация нового пользователя.</h2>
    <?php }?>
        <table border="0" cellpadding="" cellspacing="8">
        <tr>
            <td><b>Логин:<span class="redstar">*</span></b></td>
            <td><input type="text" id="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" /><br/>
                <span id="msg_login" class="msg_log">Введите логин.</span></td>
        </tr>
        <tr>
            <td><b>E-mail:<span class="redstar">*</span></b></td>
            <td><input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" /><br/>
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
    <?php }else{ ?>
    <h2 align="center">Регистрация нового пользователя прошла успешно!</h2>
    <p>Но это еще не всё!</p>
    <p>На указанный e-mail была выслана ссылка с подтверждающих кодом. Вам надо перейти по этой ссылке для завершения процесса регистрации.</p>
    <p><a href="/injustice/">Не пришло письмо подтверждения регистрации?</a></p>
    <?php }?>
<?php }?><?php }} ?>