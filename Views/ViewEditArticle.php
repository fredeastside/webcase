<?php if($edit):?>
<form method="post">  
<input type="text" name="title" size="80" value="<?php echo $article['title_article'] ;?>" /><br/>
<input type="text" name="author" size="40" value="<?php echo $article['author_article'] ;?>" /><br/>
<input type="text" name="date" size="40" value="<?php echo $article['date_article'] ;?>" /><br/>
<textarea name="content" cols="68" rows="30" > 
<?php echo $article['content_article'] ;?>
</textarea>
<input type="submit" class="adm_button" value="Сохранить" />
</form>
<?php else:
	header('Location: /index.php');
	die();
	endif;?>