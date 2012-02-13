{foreach from=$articles item=article}
<div style="margin-bottom: 15px;">
 <h3><a href="/article/{$article.id_article}.html">{$article.title_article}</a></h3>
     <p>{$article.content_article}</p>
</div>
{/foreach}
{if $add}
<form method="post">
    <p align="center"><a href="/addarticle.html"><input type="button" class="adm_button" value="Добавить" /></a></p>
</form>
{/if}
<div class="paginator">
{$pages_menu}
</div>
 
