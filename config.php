<?php
session_start();
ini_set('display_errors', 1);

DEFINE ('ROOT', $_SERVER['DOCUMENT_ROOT']); //Constante com local root do projeto
DEFINE ('ADMIN_VIEWS', ROOT.'app/views/admin/');

require ROOT.'autoload.php'; //Autoload para trabalho com namespace
require ROOT.'vendor/autoload.php'; //Composer autoload
require ROOT.'connection.php'; //Conexão com o banco de dados - ActiveRecord
require ROOT.'public/functions/functions.php'; //funcções publicas

	//INSTANCIANDO O SLIMFRAMEWORK
	$app = new \Slim\Slim(array(
		'debug' 			=> false, //debug falso para mostrar nossos erros personalizados
		'templates.path' 	=> ROOT.'app/views',	//dizemos ao slim que a pasta de temas é a view em Apps
		'mode'				=>'development',
		'log.writer'		=> new \Slim\Logger\DateTimeFileWriter() //Slim Log
	));
	//$debugBar = new \Slim\Middleware\DebugBar(); //Slim DebugBar

	//instanciando o Slim e tratando os erros

	$app->notFound(function() use($app){
		$app->render('layout.php',array('pagina'=>'404')); //informamos ao Slim que a página padrão é o layout.php, caso a página seja 404.
	});

	//tratamento de erros para o slimframework
	$app->error(function(\exception $e) use($app){
		$errors=array(
			'mensagem'	=> $e->getMessage(), //Pega a Mensagem
			'file'		=> $e->getFile(), //Pega o Lccal do arquivo
			'line'		=> $e->getLine(), //Pega a linha do arquivo
			'pagina'	=> 'error' // página personalizada para os erros
			);
		$app->render('layout.php',$errors); // Hora de morfar... digo, renderizar os erros em uma página personalizada com layout padrão.
	});
