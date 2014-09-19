<?php
	class Anuncio extends AppModel
	{
		public $useTable = "tb_anuncio";
		
		public $hasOne = array("Profissional" => 
								array("className" => "Profissional",
									"Condições" => "",
									"Ordem" => "",
									"Dependente" => true,
									"ForeignKey" => "profissional_id"));
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/
		
		public $belongsTo = array ("Endereco" =>
								array("className" => "Endereco",
								"foreignKey" => "endereco_id"));
		
	}
?>