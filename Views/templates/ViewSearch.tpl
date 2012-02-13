{if !is_array($search_result)}
<h2>{$search_result}</h2>
{else}
{foreach from=$search_result item=data}
<div style="margin-bottom: 15px;">
 <h3>
	{if $data.number == 1}
		<a href="/article/{$data.id}.html">{$data.title}</a>
	{else}
		<a href="/new/{$data.id}.html">{$data.title}</a>
	{/if}
</h3>
     <p>{$data.content}</p>
</div>
{/foreach}
{/if}