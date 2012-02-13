<?php /* Smarty version Smarty-3.1.7, created on 2012-02-10 22:16:21
         compiled from "Z:\home\webcase\www\Views\templates\ViewArticle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8924f33aecfcdeb95-08468994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e77fdec00cac7e51439b9edfe83a1d9ebb48127' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\ViewArticle.tpl',
      1 => 1328901373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8924f33aecfcdeb95-08468994',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f33aed064e87',
  'variables' => 
  array (
    'article' => 0,
    'edit' => 0,
    'delete' => 0,
    'comments' => 0,
    'comment' => 0,
    'delete_comment' => 0,
    'add_comment' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f33aed064e87')) {function content_4f33aed064e87($_smarty_tpl) {?><h2><?php echo $_smarty_tpl->tpl_vars['article']->value['title_article'];?>
</h2>
<p class="small_text"><b>Автор: </b><?php echo $_smarty_tpl->tpl_vars['article']->value['author_article'];?>
<br/>
<b>Дата: </b><?php echo $_smarty_tpl->tpl_vars['article']->value['date_article'];?>
</p>
<?php echo $_smarty_tpl->tpl_vars['article']->value['content_article'];?>

<?php if ($_smarty_tpl->tpl_vars['edit']->value){?>
<table border="0">
    <tr>
        <td>
            <a href="/editarticle/<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
.html"><input type="button" class="adm_button" value="Редактировать"/></a>
        </td>
		<?php if ($_smarty_tpl->tpl_vars['delete']->value){?>
        <td>
            <form method="post">
                <input type="submit" name="delete_article" class="adm_button" value="Удалить" />
            </form>
        </td>
		<?php }?>
    </tr>
</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['comments']->value){?>
<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
<div id="comments" class="comments">
	<p><span style="color:#c0c0c0;"><span style="font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['comment']->value['login'];?>
</span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['comment']->value['date_comment'];?>
</span></p>
	<?php echo $_smarty_tpl->tpl_vars['comment']->value['content_comment'];?>

<?php if ($_smarty_tpl->tpl_vars['delete_comment']->value){?>
<p align="right"><input type="image" name="delete_comment" src="/Views/images/mail-delete.png" /></p>
<?php }?>
</div>
<?php } ?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['add_comment']->value){?>

<script type="text/javascript">
$(document).ready(function(){

     function reload()
     {
        src=document.code.src;
        document.code.src=src+'?rand='+Math.random();
     }

	var working = false;
	
	$('#addCommentForm').submit(function(e){

 		e.preventDefault();
		if(working) return false;
		
		working = true;
		$('#submit').val('Working..');

		//tinyMCE.get('body').save();
		
		$.post(document.location.href, $(this).serialize(), function(msg){

			working = false;
			$('#submit').val('Отправить');

            var obj = $.parseJSON(msg);
			
			if(obj.status){

				$(obj.html).hide().insertBefore('#addCommentContainer').slideDown();
                $('#captcha').val('');
                //tinyMCE.activeEditor.setContent('');
                reload();
                $('span[id^=msg_]').hide();
                $('span[id^=msg_]').html("");
			}
			else {
                $('span[id^=msg_]').hide();
                $('span[id^=msg_]').html("");
				
				$.each(obj.errors,function(k,v){
					$('span[id=msg_'+k+']').html(v);
					$('span[id=msg_'+k+']').show('slow');
                    reload();
				});
			}
		}, 'JSON' ); 

	});
	
});
</script>

<?php if ($_smarty_tpl->tpl_vars['errors']->value){?>
<p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
<?php }?>
<div id="addCommentContainer">
	<form id="addCommentForm" method="post">
		<table border="0">
		    <tr>
				<td colspan="2">Оставить комментарий:</td>
		    </tr>
			<tr>
		        <td colspan="2"><label for="body"><textarea id="body" name="content" cols="40" rows="10" ></textarea>
                    <script type="text/javascript">CKEDITOR.replace('body', {toolbar : 'Basic'});</script>
                    <span id="msg_body" class="msg_log"></span></td>
		    </tr>
			<tr>
				<td width="100"><img style="vertical-align: middle;" src="/Views/captcha/captcha.php" alt="код подтверждения" name="code" border="0"></td>
				<td><input type="text" id="captcha" name="captcha" style="width:125px; font-size:310%;" /></td>
			</tr>
                <td colspan="2"><span id="msg_captcha" class="msg_log"></span></td>
            <tr>
            </tr>
		    <tr>
		        <td colspan="2" align="center"><input type="submit" id="submit" class="adm_button" value="Отправить" /></td>
		    </tr>
		</table>
	</form>
</div>
<?php }?>
<?php }} ?>