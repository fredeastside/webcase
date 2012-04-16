<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>{$title}</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
        {$xajax}
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
				{if $user}
                    <td><a href="/admin/">Панель управления</a></td>
					<td>&nbsp;|&nbsp;</td>
					<td><a href="/logout/">Выход</a></td>
				{else}
					<td><a href="/login/">Вход</a></td>
					<td>&nbsp;|&nbsp;</td>
					<td><a href="/registration/">Регистрация</a></td>
				{/if}
				</tr>
				</table>
				</div>
			</div><!-- #header-->

			<div id="middle">

				<div id="container">
					<div id="content">
						{$content}
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
					{foreach from=$lastNews item=new}
					<p class="last_news">
					<a href="/new/{$new.id_new}/">{$new.title_new}</a>
					</p>
					{/foreach}
					</div>
				</div><!-- .sidebar#sideRight -->

			</div><!-- #middle-->

		</div><!-- #wrapper -->

		<div id="footer">
			<div id="copyright">
				<p>Web thrust &copy; 2011 - 2012, all rights reserved.</p>
                {literal}
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
                {/literal}
			</div>
		</div><!-- #footer -->
	</body>
</html>