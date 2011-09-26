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
<table border="0">
    <tr>
        <td>
            <a href="index.php?c=editnew&id=<?php echo $new['id_new'];?>"><input type="button" value="Редактировать"/></a>
        </td>
        <td>
            <form method="post">
                <input type="submit" value="Удалить" />
            </form>
        </td>
    </tr>
</table>
<?endif;?>
