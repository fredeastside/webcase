<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 11.08.11
 * Time: 22:58
 * To change this template use File | Settings | File Templates.
 */
?>
 <h1><?php echo $new['title_new'] ;?></h1>
    <p><?php echo $new['author_new'] ;?></p>
    <p><?php echo $new['date_new'] ;?></p>
    <p><?php echo $new['content_new'] ;?></p>
<?php if($edit):?>
<a href="index.php?c=editnew&id=<?php echo $new['id_new'];?>">Редактировать</a>
<?endif;?>
