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
                <input type="submit" class="adm_button" value="Удалить" />
            </form>
        </td>
		<?php endif;?>
    </tr>
</table>
<?endif;?>
<?php if($comments) :?>
<?php foreach($comments as $comment):?>
<div id="comments" class="comments">
	<p><span style="color:#c0c0c0;"><span style="font-weight: bold;"><?php echo $comment['login']; ?></span>&nbsp;<?php echo date( 'd-m-Y', strtotime( $comment['date_comment'] )); ?></span></p>
	<p><?php echo $comment['content_comment']; ?></p>
<?php if($delete_comment) :?>
<p align="right"><input type="image" src="/Views/images/mail-delete.png" /></p>
<?php endif;?>
</div>
<?php endforeach;?>
<?php endif;?>
<?php if($add_comment) :?>
<form method="post">
<table border="0">
    <tr>
		<td colspan="2">Оставить комментарий:</td>
    </tr>
	<tr>
        <td colspan="2"><textarea name="content" cols="40" rows="10" ></textarea></td>
    </tr>
	<tr>
		<td width="100"><img style="vertical-align: middle;" src="/Views/captcha/captcha.php" alt="код подтверждения" border="0"></td>
		<td><input type="text" id="check_code" name="captcha" style="width:125px; font-size:310%;" /><span id="msg_check_code" class="msg_log"></span></td>
	</tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" class="adm_button" value="Отправить" /></td>
    </tr>
</table>
</form>
<?php endif;?>