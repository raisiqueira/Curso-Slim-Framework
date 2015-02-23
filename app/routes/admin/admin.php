<?php

/*
*	parte do admin, aqui informamos novamente qual a pasta das views do admin.
*	fazemos a virificação da Sessão, se houver, redireciona pro painel, se não, redireciona pro Admin
 */

$app->get('/admin/painel', function() use($app){
	$adminView = $app->view();
	$adminView->setTemplatesDirectory(ADMIN_VIEWS);
	\app\classes\Login::verificaLogin('logado_admin',$app);
	$data = array('pagina'=>'painel', 'nome'=> $_SESSION['nome_admin']); //Passa os dados da array para a view
	$app->render('layout.php', $data); //renderiza o layout + os dados da array
});

$app->get('/admin/painel/listar', function() use($app){
	$app->response->headers->set('Content-Type', 'application/json');
	$posts = new \app\models\Posts();
	$postsEncontrados = $posts->listar();
	echo $posts->toJson($postsEncontrados);
});

$app->delete('/admin/post/deletar/:id', function($id) use($app){
	$post = new \app\models\Posts();
	try{
		$post->deletar($id);
		echo 'deletou';
	}catch(\ActiveRecord\ActiveRecordException $e){
		echo $e->getMessage();
	}
	
});

$app->get('/admin/post/editar/:id', function($id) use($app){
	echo 'atualizar post';
});