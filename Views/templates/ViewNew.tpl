<h2>{$new.title_new}</h2>
<p class="small_text"><b>Автор: </b>{$new.author_new}<br/>
<b>Дата: </b>{$new.date_new}</p>
{$new.content_new}
{if $edit}
<table border="0">
    <tr>
        <td>
            <a href="/editnew/{$new.id_new}.html"><input type="button" class="adm_button" value="Редактировать"/></a>
        </td>
		{if $delete}
        <td>
            <form method="post">
                <input type="submit" class="adm_button" value="Удалить" />
            </form>
        </td>
		{/if}
    </tr>
</table>
{/if}
