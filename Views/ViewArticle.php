<h2><?php echo $article['title_article'] ;?></h2>
<p class="small_text"><b>Автор: </b><?php echo $article['author_article'] ;?></p>
<p class="small_text"><b>Дата: </b><?php echo $article['date_article'] ;?></p>
<p><?php echo $article['content_article'] ;?></p>
<?php if($edit):?>
<table border="0">
    <tr>
        <td>
            <a href="/editarticle/<?php echo $article['id_article'];?>"><input type="button" class="adm_button" value="Редактировать"/></a>
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