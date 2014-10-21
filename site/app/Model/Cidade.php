<?php
	class Cidade extends AppModel
	{
		public $useTable = "tb_cidade";
		
		public $validate = array(
			'nome_cidade' => array(
				'rule' => 'notEmpty'));
		
		public $hasMany = array (
			'Logradouro' => array (
					'className' => 'Logradouro',
					'foreignKey' => 'id_cidade' 
		));
	}
?>