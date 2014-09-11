<?php
	class Endereco extends AppModel
	{
		public $useTable = "tb_endereco";
		
		public $hasOne = array("Cliente" => 
								array("className" => "Cliente",
									"Condições" => "",
									"Ordem" => "",
									"Dependente" => true,
									"ForeignKey" => "endereco_id"));
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/
		
	}
?>