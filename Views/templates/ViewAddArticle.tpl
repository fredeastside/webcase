{if $add}
<h2>Добавить статью</h2>
<form method="post"> 
<table border="0" cellpadding="2" cellspacing="5"> 
<tr>
	<td><b>Заголовок:</b></td>
	<td><input type="text" class="edit_content" name="title" size="80" /></td>
</tr>
<tr>
	<td><b>Автор:</b></td>
	<td><input type="text" class="edit_content" name="author" size="60" /></td>
</tr>
<tr>
	<td><b>Дата:</b></td>
	<td><input type="text" class="edit_content" name="date" value="{$date}" size="20" /></td>
</tr>
<tr>
	<td><b>Раздел:</b></td>
	<td>
		<select name="section">
			<option selected value="all">Статьи</option>
			<option selected value="php">PHP</option>
			<option selected value="javascript">JAVASCRIPT</option>
			<option selected value="sql">SQL</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2"><textarea id="text" name="content" cols="90" rows="30" ></textarea><script type="text/javascript">CKEDITOR.replace('text');</script></td>
</tr>
</table>
<p align="center"><input type="submit" class="adm_button" value="Сохранить" /></p>
</form>
{/if}