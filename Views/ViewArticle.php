<h2><?php echo $article['title_article'] ;?></h2>
<p class="small_text"><b>Автор: </b><?php echo $article['author_article'] ;?></p>
<p class="small_text"><b>Дата: </b><?php echo $article['date_article'] ;?></p>
<p><?php echo $article['content_article'] ;?></p>
<?php if($edit):?>
<table border="0">
    <tr>
        <td>
            <a href="/editarticle/<?php echo $article['id_article'];?>.html"><input type="button" class="adm_button" value="Редактировать"/></a>
        </td>
		<?php if($delete):?>
        <td>
            <form method="post">
                <input type="submit" name="delete_article" class="adm_button" value="Удалить" />
            </form>
        </td>
		<?php endif;?>
    </tr>
</table>
<?endif;?>
<?php if($comments) :?>
<?php foreach($comments as $comment):?>
<div id="comments" class="comments">
	<p><span style="color:#c0c0c0;"><span style="font-weight: bold;"><?php echo $comment['login']; ?></span>&nbsp;<?php echo date( 'd-m-Y H:i', strtotime( $comment['date_comment'] )); ?></span></p>
	<p><?php echo $comment['content_comment']; ?></p>
<?php if($delete_comment) :?>
<p align="right"><input type="image" name="delete_comment" src="/Views/images/mail-delete.png" /></p>
<?php endif;?>
</div>
<?php endforeach;?>
<?php endif;?>
<?php if($add_comment) :?>
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

		tinyMCE.get('body').save();
		
		$.post(document.location.href, $(this).serialize(), function(msg){

			working = false;
			$('#submit').val('Отправить');

            var obj = $.parseJSON(msg);
			
			if(obj.status){

				$(obj.html).hide().insertBefore('#addCommentContainer').slideDown();
                $('#captcha').val('');
                tinyMCE.activeEditor.setContent('');
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
<?php if($errors) :?>
<p><?php echo $errors; ?></p>
<?php endif;?>
<div id="addCommentContainer">
	<form id="addCommentForm" method="post">
		<table border="0">
		    <tr>
				<td colspan="2">Оставить комментарий:</td>
		    </tr>
			<tr>
		        <td colspan="2"><label for="body"><textarea id="body" name="content" cols="40" rows="10" ></textarea><span id="msg_body" class="msg_log"></span></td>
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
<?php endif;?>
