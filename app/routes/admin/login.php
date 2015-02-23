<?php

$app->get('/admin', function() use($app){
	$adminView = $app->view(); //nova Configuração para as views
	$adminView->setTemplatesDirectory(ADMIN_VIEWS); //agora dizemos ao Slim onde estão as views do admin
	$app->render('layoutLogin.php'); //renderiza a página de login
});

$app->post('/logar/', function() use($app){
	$adminView = $app->view(); //nova Configuração para as views
	$adminView->setTemplatesDirectory(ADMIN_VIEWS); //agora dizemos ao Slim onde estão as views do admin

	$login = $app->request()->post('user'); // pega as informações do usuario via post
	$senha = $app->request()->post('pass');	// pega as informações da senha via post

	$admin = new \app\models\Administrador(); //chama o model administrador
	$logado = $admin->logar($login,$senha); // busca no banco, e verifica se bate tudo certinho

	//Verificação login
	if(count($logado) == 1){
		$_SESSION['logado_admin'] = true;
		$_SESSION['nome_admin'] = $logado->login; //nome da seção é o nome do usuário
		$app->redirect('/admin/painel'); //redireciona para o painel admin
	}else{
		$app->flash('erro','Erro ao logar'); //retorna o erro se não estiver correto, como no banco
		$app->redirect('/admin'); //caso esteja errado, redireciona para o admin novamente
	}
});
