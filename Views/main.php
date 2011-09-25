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
		<img src="/Views/images/logo.png" class="logo">
        <span class="header_title">Sunny Web</span>
		<div id="registration">
		<table border="0">
        <tr>
		<?php if($user):?>
			<td colspan="3"><a href="index.php?c=logout">Выход</a></td>
		<?php else:?>
			<td><a href="index.php?c=login">Вход</a></td>
			<td>&nbsp;|&nbsp;</td>
			<td><a href="index.php?c=registration">Регистрация</a></td>
		<?php endif;?>
		</tr>
		</table>
		</div>
	</header><!-- #header-->
	<section id="middle">
		<div id="menu">
			<ul id="topnav">
				<li><a href="index.php?c=news">Новости</a></li>
				<li><a href="index.php?c=articles">Статьи</a></li>
				<li><a href="index.php?c=php">PHP</a></li>
				<li><a href="index.php?c=javascript">Javascript</a></li>
				<li><a href="index.php?c=sql">SQL</a></li>
			</ul>
		</div>
		<div id="container">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- #content-->
		</div><!-- #container-->

		<aside id="sideLeft">
			<p><strong>Left Sidebar:</strong> Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.</p>
		</aside><!-- #sideLeft -->

		<aside id="sideRight">
			<div id="search"><input type="text" name="" size="25" /><input type="submit" name="" value="Поиск" /></div>
			<p><strong>Right Sidebar:</strong> Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.</p>
		</aside><!-- #sideRight -->

	</section><!-- #middle-->

</div><!-- #wrapper -->

<footer id="footer">
	<p class="footerText" align="center">Copyright © 2011 Web-футляр, All Rights Reserved.</p>
</footer><!-- #footer -->
</body>
</html>
 
