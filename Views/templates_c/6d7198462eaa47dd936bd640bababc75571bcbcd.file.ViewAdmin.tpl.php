<?php /* Smarty version Smarty-3.1.7, created on 2012-03-22 16:18:49
         compiled from "Z:\home\webcase\www\Views\templates\admin\ViewAdmin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:324014f43dd16ee5e33-41914870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d7198462eaa47dd936bd640bababc75571bcbcd' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\admin\\ViewAdmin.tpl',
      1 => 1332422290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324014f43dd16ee5e33-41914870',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f43dd1716cdf',
  'variables' => 
  array (
    'title' => 0,
    'admin_menu' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f43dd1716cdf')) {function content_4f43dd1716cdf($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link rel="stylesheet" href="/Views/css/admin/css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="/Views/css/admin/css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="/Views/css/admin/css/colour.css" type="text/css" media="screen" charset="utf-8" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js" type="text/javascript"></script>
        <script src="/Views/js/prettify.js" type="text/javascript"></script>
		<script type="text/javascript" src="/Views/js/ckeditor/ckeditor.js" ></script >
        <script src="/Views/js/func.js" type="text/javascript"></script>
        <script src="/Views/js/jsTree/jquery.jstree.js" type="text/javascript"></script>
	</head>
	<body>

					<h1 id="head">THRUST CMS</h1>

		<?php echo $_smarty_tpl->tpl_vars['admin_menu']->value;?>


			<div id="content" class="container_16 clearfix">
                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

			</div>

		<div id="foot">
					<a href="ViewAdmin.tpl#">Contact Me</a>

		</div>
	</body>
</html><?php }} ?>