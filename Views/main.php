<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $title; ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="/Views/css/style.css" type="text/css" media="screen, projection" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js" type="text/javascript"></script>
	<script src="/Views/js/func.js" type="text/javascript"></script>
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

	<div id="header">
	<h1 class="title">
		<a href="/">Web thrust</a>
	</h1>
	<ul id="menu">
		<li><a href="/news.html">Новости</a></li>
		<li><a href="/articles.html">Статьи</a></li>
		<li><a href="/php.html">PHP</a></li>
		<li><a href="/javascript.html">Javascript</a></li>
		<li><a href="/sql.html">SQL</a></li>
	</ul>
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
	</div><!-- #header-->

	<div id="middle">

		<div id="container">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- #content-->
		</div><!-- #container-->

		<div class="sidebar" id="sideRight">
            <div class="rightSide">
			<div id="search">
				<form method="post" action="/search.html">
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
			<?php foreach($lastNews as $titleNew):?>
			<p class="last_news">
			<a href="/new/<?php echo $titleNew['id_new'];?>.html"><?php echo (strlen($titleNew['title_new']) > 200) ? (mb_substr($titleNew['title_new'], 0, 100)) . '...' : $titleNew['title_new'];?></a>
			</p>
			<?php endforeach;?>
            </div>
		</div><!-- .sidebar#sideRight -->

	</div><!-- #middle-->

</div><!-- #wrapper -->

<div id="footer">
	<div style="border-top: 1px dotted #cfcfcf; padding-top: 10px;">
	<strong>Web thrust &copy; 2011</strong>
	</div>
</div><!-- #footer -->

</body>
</html>