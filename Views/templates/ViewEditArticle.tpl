{if $edit}
<form method="post">
<table border="0">
    <tr>
        <td>Заголовок:</td>
        <td><input type="text" name="title" size="80" value="{$article.title_article}" /></td>
    </tr>
    <tr>
        <td>Автор:</td>
        <td><input type="text" name="author" size="60" value="{$article.author_article}" /></td>
    </tr>
    <tr>
        <td>Дата:</td>
        <td><input type="text" name="date" size="20" value="{$article.date_article}" /></td>
    </tr>
    <tr>
        <td colspan="2"><textarea name="content" id="editart" cols="90" rows="30" >{$article.content_article}</textarea></td>
        <script type="text/javascript">CKEDITOR.replace('editart');</script>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="adm_button" value="Сохранить" /></td>
    </tr>
</table>
</form>
{/if}