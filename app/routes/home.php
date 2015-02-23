<?php
$app->get('/',function() use($app){

	//listando os dados da tabela'posts'
	$post = new \app\models\Posts();
	$postsencontrados = $post->listar();

	$app->render('layout.php',array('pagina'=>'home','titulo'=>'Curso de Slim Framework by Rai','posts'=>$postsencontrados));
});

	$app->delete('/home/deletar/:id', function($id){
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

		try{
		$post = new \app\models\Posts();
		$post->deletar($id);
		echo 'Deletou';
		}catch(\ActiveRecord\ActiveRecordException $e){
			echo $e->getMessage;
		}
	});

	$app->map('/teste(/:id)', function() use($app){

	echo 'teste';

	})->via('GET','POST');