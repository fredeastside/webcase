<h2>{$article.title_article}</h2>
<p class="small_text"><b>Автор: </b>{$article.author_article}<br/>
<b>Дата: </b>{$article.date_article}</p>
{$article.content_article}
{if $edit}
<table border="0">
    <tr>
        <td>
            <a href="/editarticle/{$article.id_article}.html"><input type="button" class="adm_button" value="Редактировать"/></a>
        </td>
		{if $delete}
        <td>
            <form method="post">
                <input type="submit" name="delete_article" class="adm_button" value="Удалить" />
            </form>
        </td>
		{/if}
    </tr>
</table>
{/if}
{if $comments}
{foreach from=$comments item=comment}
<div id="comments" class="comments">
	<p><span style="color:#c0c0c0;"><span style="font-weight: bold;">{$comment.login}</span>&nbsp;{$comment.date_comment}</span></p>
	{$comment.content_comment}
{if $delete_comment}
<p align="right"><input type="image" name="delete_comment" src="/Views/images/mail-delete.png" /></p>
{/if}
</div>
{/foreach}
{/if}
{if $add_comment}
{literal}
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
{/literal}
{if $errors}
<p>{$errors}</p>
{/if}
<div id="addCommentContainer">
	<form id="addCommentForm" method="post">
		<table border="0">
		    <tr>
				<td colspan="2">Оставить комментарий:</td>
		    </tr>
			<tr>
		        <td colspan="2"><label for="body"><textarea id="body" name="content" cols="40" rows="10" ></textarea>
                    {literal}<script type="text/javascript">CKEDITOR.replace('body', {toolbar : 'Basic'});</script>{/literal}
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
{/if}
