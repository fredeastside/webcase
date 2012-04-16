<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>{$title}</title>
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

		{$admin_menu}

			<div id="content" class="container_16 clearfix">
                {$content}
			</div>

		<div id="foot">
					<a href="ViewAdmin.tpl#">Contact Me</a>

		</div>
	</body>
</html>