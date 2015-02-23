<?php

namespace app\models;

class Administrador{
	use \app\traits\mysql;

	private $table = 'admin';

	public function __construct(){
		$this->tableModel();
	}

	public function logar($login, $senha){
		$adm = \ActiveRecord\Model::find('first', array('conditions'=>array('login=? AND senha=?',$login,$senha)));
		return $adm;
	}
}