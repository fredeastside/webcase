<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 11.08.11
 * Time: 21:44
 * To change this template use File | Settings | File Templates.
 */
 foreach($news as $new): ?>
<h3>
	<a href="index.php?c=new&id=<?php echo $new['id_new']; ?>"><?php echo $new['title_new']; ?></a>
</h3>
<p><?php echo $new['content_new']; ?></p>
<?php endforeach; ?>
<?php if($add) : ?>
<form method="post">
    <a href="index.php?c=addnew"><input type="button" class="adm_button" value="Добавить" /></a>
</form>
<?php endif;?>
