<table>
    <tr>
        <th>Название меню</th>
        <th>Макрос меню</th>
        <th class="td_img">Редактировать</th>
        <th class="td_img">Удалить</th>
    </tr>
{foreach from=$menu item=link}
<tr>
    <td>{$link.title_menu}</td>
    <td>{$link.macros}</td>
    <td class="td_img"><a href="/menuitems/{$link.id_menu}/"><img src="/Views/images/admin_red.png"></a></td>
    <td class="td_img"><a href="/menu/delete/{$link.id_menu}/"><img src="/Views/images/admin_del.png"></a></td>
</tr>
{/foreach}
</table>
<form method="post">
Добавить новое меню <input type="text" name="menu_title" value="" /><br/>
    <input type="submit" value="Добавить">
</form>