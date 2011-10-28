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
	/* The following code is executed once the DOM is loaded */
	
	/* This flag will prevent multiple comment submits: */
	var working = false;
	
	/* Listening for the submit event of the form: */
	$('#addCommentForm').submit(function(e){

 		e.preventDefault();
		if(working) return false;
		
		working = true;
		$('#submit').val('Working..');
		//$('span.error').remove();
		
		//$('#body').val(tinyMCE.get('content').getContent());
		//var var_content  = tinyMCE.get('body').getContent();
		tinyMCE.get('body').save();
		//var x = $(this).serialize();
		/* Sending the form fileds to submit.php: */
		
		$.post(document.location.href, $(this).serialize(), function(msg){

			working = false;
			$('#submit').val('Отправить');
			
			if(msg.status){

				//
				//	If the insert was successful, add the comment
				//	below the last one on the page with a slideDown effect
				//

				$(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
				$('#body').val('');
			}
			else {

				//
				//	If there were errors, loop through the
				//	msg.errors object and display them on the page 
				//
				
				$.each(msg.errors,function(k,v){
					$('label[for='+k+']').append('<span class="error">'+v+'</span>');
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
		        <td colspan="2"><textarea id="body" name="content" cols="40" rows="10" ></textarea></td>
		    </tr>
			<tr>
				<td width="100"><img style="vertical-align: middle;" src="/Views/captcha/captcha.php" alt="код подтверждения" border="0"></td>
				<td><input type="text" id="captcha" name="captcha" style="width:125px; font-size:310%;" /></td>
			</tr>
		    <tr>
		        <td colspan="2" align="center"><input type="submit" id="submit" class="adm_button" value="Отправить" /></td>
		    </tr>
		</table>
	</form>
</div>
<?php endif;?>