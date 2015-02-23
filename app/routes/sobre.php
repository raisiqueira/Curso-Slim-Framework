<?php
$app->get('/sobre',function() use($app){
	$app->render('layout.php',array('pagina'=>'home','titulo'=>'sobre'));
});