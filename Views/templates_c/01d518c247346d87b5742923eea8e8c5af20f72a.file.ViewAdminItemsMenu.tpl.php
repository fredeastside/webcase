<?php /* Smarty version Smarty-3.1.7, created on 2012-03-26 23:15:31
         compiled from "Z:\home\webcase\www\Views\templates\admin\ViewAdminItemsMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168134f5e46b5f07799-12061995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01d518c247346d87b5742923eea8e8c5af20f72a' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\admin\\ViewAdminItemsMenu.tpl',
      1 => 1332789327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168134f5e46b5f07799-12061995',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f5e46b62dce6',
  'variables' => 
  array (
    'menu_items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5e46b62dce6')) {function content_4f5e46b62dce6($_smarty_tpl) {?><script type="text/javascript">
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
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <li id="phtml_<?php echo $_smarty_tpl->tpl_vars['item']->value['position'];?>
"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
        <?php } ?>
    </ul>
</div>
<form method="post">
Добавить новый раздел <input type="text" name="menu_item_title" value="" /><br/>
Ссылка <input type="text" name="link" value="" /><br/>
    <input type="submit" value="Добавить">
</form><?php }} ?>