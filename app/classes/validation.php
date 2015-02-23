<?php
namespace \app\classes;

class Validation{

	public $erros = array();

	public function Validar($data, $validacoes){
		$valido = true;
		foreach ($validacoes as $key => $value) {
			$explodeBarra = explode('|', $value);
			foreach ($explodeBarra as $metodo) {
				$post = isset($data[$key]) ? $data[$key] : NULL;
				if(!$this->$metodo($post, $key)){
					$valido = false;
				}
			}
		}
		return true;
	}

	public function obrigatorio($post, $fieldName){
		$valido = true;
		if(empty($post)){
			$valido = false;
			$this->erros[] = 'O campo '.$fieldName.' não pode ficar em branco';
		}
		return $valido;
	}

	public function email($post, $fieldName){
		$valido = true;
		if(!filter_var($post,FILTER_VALIDATE_EMAIL)){
			$this->erros[] = 'Digite um email Valido no campo '.$fieldName;
			$valido = false;
		}
		return $valido;
	}

	public function mostrarErros(){
		$erros = self::$erros;
		echo '<ul id="listar-erros">';
		foreach($erros as $erro){
			echo '<li class"erro">'.$erro.'</li>';
		}
	echo '</ul>';
	}

}