<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 11.08.11
 * Time: 21:44
 * To change this template use File | Settings | File Templates.
 */
 foreach($news as $new): ?>
<div style="margin-bottom: 15px;">
<h3>
	<a href="/new/<?php echo $new['id_new']; ?>.html"><?php echo $new['title_new']; ?></a>
</h3>
<p><?php echo $new['content_new']; ?></p>
</div>
<?php endforeach; ?>
<?php if($add) : ?>
<form method="post">
    <p align="center"><a href="/addnew.html"><input type="button" class="adm_button" value="Добавить" /></a></p>
</form>
<?php endif;?>
