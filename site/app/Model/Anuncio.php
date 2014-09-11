<?php
	class Anuncio extends AppModel
	{
		public $useTable = "tb_anuncio";
		
		public $hasOne = array("Profissional" => 
								array("className" => "Profissional",
									"Condições" => "",
									"Ordem" => "",
									"Dependente" => true,
									"ForeignKey" => "id_profissional"));
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/
		
	}
?>