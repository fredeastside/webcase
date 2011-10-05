<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<meta name="title" content="" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="/Views/css/style.css" type="text/css" media="screen, projection" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js" type="text/javascript"></script>
	<script src="/Views/js/menu.js" type="text/javascript"></script>
	<script type="text/javascript" src="/Views/js/tiny_mce/tiny_mce.js" ></script >
	<script type="text/javascript" >
	tinyMCE.init({
	        mode : "textareas",
	        theme : "simple"   //(n.b. no trailing comma, this will be critical as you experiment later)
	});
	</script >
</head>

<body>

<div id="wrapper">

	<header id="header">
		<a href="/" alt="На главную"><img title="На главную" src="/Views/images/logo-mini.png" border="0" class="logo"></a>
        <a href="/" title="На главную" class="header_title">Sunny Web</a>
		<!--img src="/Views/images/Sunny Web_01.png" border="0" /-->
		<div id="registration">
		<table border="0">
        <tr>
		<?php if($user):?>
			<td colspan="3"><a href="/logout.html">Выход</a></td>
		<?php else:?>
			<td><a href="/login.html">Вход</a></td>
			<td>&nbsp;|&nbsp;</td>
			<td><a href="/registration.html">Регистрация</a></td>
		<?php endif;?>
		</tr>
		</table>
		</div>
	</header><!-- #header-->
	<section id="middle">
		<div id="menu">
			<ul id="topnav">
				<li><a href="/news.html">Новости</a></li>
				<li><a href="/articles.html">Статьи</a></li>
				<li><a href="/php.html">PHP</a></li>
				<li><a href="/javascript.html">Javascript</a></li>
				<li><a href="/sql.html">SQL</a></li>
			</ul>
		</div>
		<div id="container">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- #content-->
		</div><!-- #container-->

		<aside id="sideLeft">
			<h2>Последине новости:</h2>
			<?php foreach($lastNews as $titleNew):?>
			<p class="last_news">
			<a href="/new/<?php echo $titleNew['id_new'];?>.html"><?php echo (strlen($titleNew['title_new']) > 200) ? (mb_substr($titleNew['title_new'], 0, 100)) . '...' : $titleNew['title_new'];?></a>
			</p>
			<?php endforeach;?>
		</aside><!-- #sideLeft -->

		<aside id="sideRight">
			<div id="search">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><input type="text" class="search_inpt" name="" size="18" /></td>
						<td valign="top"><img src="/Views/images/search_button.png"><!--input type="submit" class="adm_button" name="" value="Поиск" /--></td>
					</tr>
				</table>
			</div>
			<h2>Популярное:</h2><p>Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.</p>
		</aside><!-- #sideRight -->

	</section><!-- #middle-->

</div><!-- #wrapper -->

<footer id="footer">
	<p class="footerText" align="center">Copyright © 2011 SunnyWeb, All Rights Reserved.</p>
</footer><!-- #footer -->
</body>
</html>
 
