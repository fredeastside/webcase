<form method="post">  
<input type="text" name="title" value="<?php echo $new['title_new'] ;?>" /><br/>
<input type="text" name="author" value="<?php echo $new['author_new'] ;?>" /><br/>
<input type="text" name="date" value="<?php echo $new['date_new'] ;?>" /><br/>
<textarea name="content" cols="50" rows="15" > 
<?php echo $new['content_new'] ;?>
</textarea>
</form>