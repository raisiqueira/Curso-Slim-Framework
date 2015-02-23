<?php
$app->post('/post/cadastrar', function() use($app){

	$titulo = $app->request()->post('titulo');
	$texto = $app->request()->post('texto');

		try{
		$post = new \app\models\Posts();
		$dados = array(
			'post_titulo' 	=> $titulo,
			'post_texto' 	=> $texto
			);
		$post->cadastrar($dados);
		}catch(\ActiveRecord\ActiveRecordException $e){
			echo $e->getMessage;
		}

});

$app->get('/post/editar/:id', function($id) use($app){

	//listar todos os posts
	$post = new \app\models\Posts();
	$postsencontrados = $post->listar();

	//pegar post escolhido via get id
	$dadosPost = $post->pegarPeloId($id);
	$app->render('layout.php', array('pagina'=>'home','titulo'=> 'Curso de Slim Framework','posts'=>$postsencontrados,'editar'=>$dadosPost));
});

$app->put('/post/atualizar/:data', function($data){
	$dados = array();
	parse_str($data, $dados); //Pega as informações da query string e transforma em um array

	$posts = new \app\models\Posts();

	$titulo = filter_var($dados['titulo'], FILTER_SANITIZE_STRING); //filtra os dados vindo do POST name="titulo"
	$texto 	= filter_var($dados['texto'], FILTER_SANITIZE_STRING);	//filtra os dados vindo do POST name="texto"
	$id 	= filter_var($dados['postId'], FILTER_SANITIZE_NUMBER_INT);	//filtra os dados vindo do POST name="postId"

	try{
	$attributes = array(
		'post_titulo' => $titulo, //nome da coluna onde vai atualizar os dados - os dados retornam filtrados das variaveis acima
		'post_texto' => $texto
		);

		$posts->atualizar($id, $attributes);
		echo 'atualizou';
	}catch(\ActiveRecord\ActiveRecordException $e){
		echo $e->getMessage();
	}
});