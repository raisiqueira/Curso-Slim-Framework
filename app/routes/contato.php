<?php
$app->get('/contato',function() use($app){
	$app->render('layout.php',array('pagina'=>'home','titulo'=>'Página de Contato'));
});