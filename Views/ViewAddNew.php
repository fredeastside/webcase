<?php if($add):?>
<h2>Добавить новость</h2>
<form method="post">  
<input type="text" name="title" size="80" /><br/>
<input type="text" name="author" size="40" /><br/>
<input type="text" name="date" size="40" /><br/>
<textarea name="content" cols="68" rows="30" ></textarea>
<input type="submit" class="adm_button" value="Сохранить" />
</form>
<?php else:
	header('Location: index.php');
	die();
	endif;?>