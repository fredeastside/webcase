{foreach from=$news item=new}
<div style="margin-bottom: 15px;">
<h3>
	<a href="/new/{$new.id_new}/">{$new.title_new}</a>
</h3>
<p>{$new.content_new}</p>
</div>
{/foreach}
{if $add}
<form method="post">
    <p align="center"><a href="/addnew/"><input type="button" class="adm_button" value="Добавить" /></a></p>
</form>
{/if}
<div class="paginator">
{$pages_menu}
</div>