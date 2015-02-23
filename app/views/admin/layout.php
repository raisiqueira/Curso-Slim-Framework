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
	</head>
	<body>
	<div class="container">
	<?php require $pagina.'.php'; ?>
	
	</div>
	</body>
	<script src="//cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
	<script src="<?php echo siteUrl(); ?>/public/js/posts.js"></script>

</html>