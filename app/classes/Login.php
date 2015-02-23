<?php

namespace app\classes;

class Login{

	public static function verificaLogin($nomeSessao,$app)
	{
		//Verifica se não tem sessão e redireciona para o admin (login)
		if(!isset($_SESSION[$nomeSessao])){
			$app->redirect('/admin');
		}
	}
}