<?php
namespace app\traits;

trait mysql{

	private $dataArray = array();

	public function tableModel()
	{
		\ActiveRecord\Model::$table_name = $this->table; //pega o nome da tabela através do model POST.php
	}

	public function listar()
	{
		return \ActiveRecord\Model::find('all'); //listar todos
	}

	public function deletar($id)
	{
		$deletar = \ActiveRecord\Model::find($id); //listar o id desejado
		$deletar->delete();
	}

	public function cadastrar($dados)
	{
		\ActiveRecord\Model::create($dados);
	}

	public function pegarPeloId($id)
	{
		return \ActiveRecord\Model::find($id);
	}

	public function atualizar($id, $attributes)
	{
		$atualizar = \ActiveRecord\Model::find($id);
		$atualizar->update_attributes($attributes);
	}

	public function toJson($returnedData)
	{
		foreach($returnedData as $data):
			array_push($this->dataArray, $data->to_array());
		endforeach;
		return json_encode($this->dataArray);
	}
}