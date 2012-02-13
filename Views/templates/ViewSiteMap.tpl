<div style="margin-bottom: 15px;">
    <ul>
        <li>Новости</li>
            <ul>
            {foreach from=$news item=new}
                <li><a href="/news/{$new.id_new}.html">{$new.title_new}</a></li>
            {/foreach}
            </ul>
        <li>Статьи</li>
            <ul>
            {foreach from=$articles item=article}
                <li><a href="/articles/{$article.id_article}.html">{$article.title_article}</a></li>
            {/foreach}
            </ul>
        <li>PHP</li>
            <ul>
            {foreach from=$php_articles item=article}
                <li><a href="/articles/{$article.id_article}.html">{$article.title_article}</a></li>
            {/foreach}
            </ul>
        <li>JAVASCRIPT</li>
            <ul>
            {foreach from=$js_articles item=article}
                <li><a href="/articles/{$article.id_article}.html">{$article.title_article}</a></li>
            {/foreach}
            </ul>
        <li>SQL</li>
            <ul>
            {foreach from=$sql_articles item=article}
                <li><a href="/articles/{$article.id_article}.html">{$article.title_article}</a></li>
            {/foreach}
            </ul>
    </ul>
</div>