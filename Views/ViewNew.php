<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 11.08.11
 * Time: 22:58
 * To change this template use File | Settings | File Templates.
 */
?>
 <h2><?php echo $new['title_new'] ;?></h2>
    <p class="small_text"><b>Автор: </b><?php echo $new['author_new'] ;?></p>
    <p class="small_text"><b>Дата: </b><?php echo $new['date_new'] ;?></p>
    <p><?php echo $new['content_new'] ;?></p>
<?php if($edit):?>
<table border="0">
    <tr>
        <td>
            <a href="/editnew/<?php echo $new['id_new'];?>.html"><input type="button" class="adm_button" value="Редактировать"/></a>
        </td>
		<?php if($delete):?>
        <td>
            <form method="post">
                <input type="submit" class="adm_button" value="Удалить" />
            </form>
        </td>
		<?php endif;?>
    </tr>
</table>
<?endif;?>
