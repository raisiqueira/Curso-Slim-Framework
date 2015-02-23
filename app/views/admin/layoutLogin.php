<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login - Curso Slim Framework</title>

		<!-- CSS do Site -->
		<link href="<?php echo siteUrl(); ?>/vendor/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo siteUrl(); ?>/public/css/admin.css" rel="stylesheet">
	</head>
	<body>
		<div id="fullscreen_bg" class="fullscreen_bg"/>

		<div class="container">

			<form class="form-signin" action="/logar/" method="post" accept-charset="utf-8">
				<h1 class="form-signin-heading text-muted">Login</h1>
				<input type="text" name="user" class="form-control" placeholder="Usuário" required="" autofocus="">
				<input type="password" name="pass" class="form-control" placeholder="Senha" required="">
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="logar">
					Logar no Sistema
				</button>
				<?php if(isset($flash['erro'])) : ?>
				<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<?php echo  'Ops :/ '.$flash['erro']; ?>
				</div>
			<?php else: echo ''; ?>
				<?php endif ?>
			</form>
		</div>
	</body>
	<script src="<?php echo siteUrl(); ?>/public/js/jquery.js"></script>
	<<script src="<?php echo siteUrl(); ?>/vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>

</html>