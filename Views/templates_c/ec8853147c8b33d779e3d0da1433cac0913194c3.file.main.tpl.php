<?php /* Smarty version Smarty-3.1.7, created on 2012-03-03 16:47:21
         compiled from "Z:\home\webcase\www\Views\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241724f30218ef16cc6-43227540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec8853147c8b33d779e3d0da1433cac0913194c3' => 
    array (
      0 => 'Z:\\home\\webcase\\www\\Views\\templates\\main.tpl',
      1 => 1330781814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241724f30218ef16cc6-43227540',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f30218f24afe',
  'variables' => 
  array (
    'title' => 0,
    'xajax' => 0,
    'user' => 0,
    'content' => 0,
    'lastNews' => 0,
    'new' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f30218f24afe')) {function content_4f30218f24afe($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
        <?php echo $_smarty_tpl->tpl_vars['xajax']->value;?>

		<link rel="stylesheet" href="/Views/css/style.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="/Views/css/prettify.css" type="text/css" media="screen, projection" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js" type="text/javascript"></script>
        <script src="/Views/js/prettify.js" type="text/javascript"></script>
		<script type="text/javascript" src="/Views/js/ckeditor/ckeditor.js" ></script >
        <script src="/Views/js/func.js" type="text/javascript"></script>
	</head>

	<body onload="prettyPrint()">

		<div id="wrapper">

			<div id="header">
                <div id="navigation">
                    <a href="/" title="На главную"><img alt="" src="/Views/images/home.png"/></a>
                    <a href="mailto:fredrsf@yandex.ru" title="Написать письмо"><img alt="" src="/Views/images/mail.png"/></a>
                    <a href="/sitemap/" title="Карта сайта"><img alt="" src="/Views/images/sitemap.png"/></a>
                </div>
			<span class="title" style="position: relative;">
				<a href="/">Web thrust</a>
			</span>
			<ul id="menu">
				<li><a href="/news/">Новости</a></li>
				<li><a href="/articles/">Статьи</a></li>
				<li><a href="/php/">PHP</a></li>
				<li><a href="/javascript/">Javascript</a></li>
				<li><a href="/sql/">SQL</a></li>
			</ul>
				<div id="registration">
				<table border="0">
				<tr>
				<?php if ($_smarty_tpl->tpl_vars['user']->value){?>
                    <td><a href="/admin/">Панель управления</a></td>
					<td>&nbsp;|&nbsp;</td>
					<td><a href="/logout/">Выход</a></td>
				<?php }else{ ?>
					<td><a href="/login/">Вход</a></td>
					<td>&nbsp;|&nbsp;</td>
					<td><a href="/registration/">Регистрация</a></td>
				<?php }?>
				</tr>
				</table>
				</div>
			</div><!-- #header-->

			<div id="middle">

				<div id="container">
					<div id="content">
						<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

					</div><!-- #content-->
				</div><!-- #container-->

				<div class="sidebar" id="sideRight">
					<div class="rightSide">
					<div id="search">
						<form method="post" action="/search/">
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><input type="text" class="search_input" name="search" size="18" /></td>
								<td valign="top"><input type="image" class="search_button" src="/Views/images/search_button.png"></td>
							</tr>
						</table>
						</form>
					</div>
					<h3>Популярное:</h3><p>Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.</p>
					<h3>Последине новости:</h3>
					<?php  $_smarty_tpl->tpl_vars['new'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lastNews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new']->key => $_smarty_tpl->tpl_vars['new']->value){
$_smarty_tpl->tpl_vars['new']->_loop = true;
?>
					<p class="last_news">
					<a href="/new/<?php echo $_smarty_tpl->tpl_vars['new']->value['id_new'];?>
/"><?php echo $_smarty_tpl->tpl_vars['new']->value['title_new'];?>
</a>
					</p>
					<?php } ?>
					</div>
				</div><!-- .sidebar#sideRight -->

			</div><!-- #middle-->

		</div><!-- #wrapper -->

		<div id="footer">
			<div id="copyright">
				<p>Web thrust &copy; 2011 - 2012, all rights reserved.</p>
                
                <!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t26.1;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число посетителей за"+
" сегодня' "+
"border='0' width='88' height='15'><\/a>")
//--></script><!--/LiveInternet-->
                
			</div>
		</div><!-- #footer -->
	</body>
</html><?php }} ?>