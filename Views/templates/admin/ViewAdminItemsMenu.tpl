<script type="text/javascript">
$(function () {
    $("#toggle_node").click(function () {
        $("#demo1").jstree("toggle_node","#phtml_1");
    });
    $("#demo1")
        .bind("open_node.jstree close_node.jstree", function (e) {
            $("#log1").html("Last operation: " + e.type);
        })
        .jstree({ "plugins" : [ "themes", "html_data" ] });
    });
</script>
<div id="demo1">
    <ul>
        {foreach from=$menu_items item=item}
            <li id="phtml_{$item.position}"><a href="#">{$item.name}</a></li>
        {/foreach}
    </ul>
</div>
<form method="post">
Добавить новый раздел <input type="text" name="menu_item_title" value="" /><br/>
Ссылка <input type="text" name="link" value="" /><br/>
    <input type="submit" value="Добавить">
</form>