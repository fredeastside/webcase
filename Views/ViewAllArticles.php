<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 24.08.11
 * Time: 22:50
 * To change this template use File | Settings | File Templates.
 */
 foreach($articles as $article):
?>
<div style="margin-bottom: 15px;">
 <h3><a href="/article/<?php echo $article['id_article']; ?>.html"><?php echo $article['title_article']; ?></a></h3>
     <p><?php echo $article['content_article']; ?></p>
</div>
<?php endforeach; ?>
<?php if($add) : ?>
<form method="post">
    <p align="center"><a href="/addarticle.html"><input type="button" class="adm_button" value="Добавить" /></a></p>
</form>
<?php endif;?>
 
