<?php if($edit):?>
<form method="post">  
<input type="text" name="title" size="80" value="<?php echo $new['title_new'] ;?>" /><br/>
<input type="text" name="author" size="40" value="<?php echo $new['author_new'] ;?>" /><br/>
<input type="text" name="date" size="40" value="<?php echo $new['date_new'] ;?>" /><br/>
<textarea name="content" cols="80" rows="40" > 
<?php echo $new['content_new'] ;?>
</textarea>
<input type="submit" value="Сохранить" />
</form>
<?php else:
	header('Location: index.php');
	die();
	endif;?>