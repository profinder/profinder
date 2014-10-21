<?php
	class Bairro extends AppModel
	{
		public $useTable = "tb_bairro";
		
		public $validate = array(
			'nome_bairro' => array(
				'rule' => 'notEmpty'));
		
		public $hasMany = array (
			'Logradouro' => array (
					'className' => 'Logradouro',
					'foreignKey' => 'id_bairro' 
		));
	}
?>