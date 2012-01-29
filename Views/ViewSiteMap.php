<div style="margin-bottom: 15px;">
    <ul>
        <li>Новости</li>
            <ul>
            <?php foreach($news as $new):?>
                <?php echo '<li><a href="/news/' . $new['id_new'] . '.html">' . $new['title_new'] . '</a></li>';?>
            <? endforeach; ?>
            </ul>
        <li>Статьи</li>
            <ul>
            <?php foreach($articles as $article):?>
                <?php echo '<li><a href="/articles/' . $article['id_article'] . '.html">' . $article['title_article'] . '</a></li>';?>
            <? endforeach; ?>
            </ul>
        <li>PHP</li>
            <ul>
            <?php foreach($php_articles as $article):?>
                <?php echo '<li><a href="/articles/' . $article['id_article'] . '.html">' . $article['title_article'] . '</a></li>';?>
            <? endforeach; ?>
            </ul>
        <li>JAVASCRIPT</li>
            <ul>
            <?php foreach($js_articles as $article):?>
                <?php echo '<li><a href="/articles/' . $article['id_article'] . '.html">' . $article['title_article'] . '</a></li>';?>
            <? endforeach; ?>
            </ul>
        <li>SQL</li>
            <ul>
            <?php foreach($sql_articles as $article):?>
                <?php echo '<li><a href="/articles/' . $article['id_article'] . '.html">' . $article['title_article'] . '</a></li>';?>
            <? endforeach; ?>
            </ul>
    </ul>
</div>