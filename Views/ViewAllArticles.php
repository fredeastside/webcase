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
 <h3><a href="index.php?c=article&id=<?php echo $article['id_article']; ?>"><?php echo $article['title_article']; ?></a></h3>
     <p><?php echo $article['content_article']; ?></p>
<?php
 endforeach;
?>
 
