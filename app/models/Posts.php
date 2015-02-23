<?php
namespace app\models;

class Posts{
	use \app\traits\mysql;
	private $table='posts'; //passa o valor da variável $table para a trait mysql

	public function __construct(){
		$this->tableModel();
	}
}