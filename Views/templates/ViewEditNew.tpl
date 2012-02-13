{if $edit}
<form method="post">  
<table border="0">
    <tr>
        <td>Заголовок:</td>
		<td><input type="text" name="title" size="80" value="{$new.title_new}" /></td>
	</tr>
    <tr>
        <td>Автор:</td>	
		<td><input type="text" name="author" size="60" value="{$new.author_new}" /></td>
	</tr>
    <tr>
        <td>Дата:</td>
		<td><input type="text" name="date" size="20" value="{$new.date_new}" /></td>
	</tr>
	<tr>
		<td colspan="2"><textarea name="content" cols="90" rows="30" > 
{$new.content_new}
</textarea></td>
	<tr>
		<td colspan="2"><input type="submit" class="adm_button" value="Сохранить" /></td>
    </tr>
</table>
</form>
{/if}