<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Curso Slim Framework</title>

		<!-- CSS do Site -->
		<link href="<?php echo siteUrl(); ?>/vendor/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo siteUrl(); ?>/public/css/style.css" rel="stylesheet">

		<script>
		var origTitle = document.title;
		window.onblur = function () { document.title = '♬ Baby come back! Any kind of fool could see... ♬'; }
		window.onfocus = function () { document.title = origTitle; }
		</script>

	</head>
	<body>
		<a href="<?php echo siteUrl(); ?>">home</a> | 
		<a href="<?php echo siteUrl(); ?>/sobre">Sobre</a> | 
		<a href="<?php echo siteUrl(); ?>/contato">Contato</a>
	<div id="container">
	<?php require $pagina.'.php'; ?>
	</div>
	</body>
	<script src="<?php echo siteUrl(); ?>/public/js/jquery.js"></script>
	<script src="<?php echo siteUrl(); ?>/public/js/posts.js"></script>
</html>