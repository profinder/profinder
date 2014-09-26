<?php
	class Mensagem extends AppModel
	{
		public $useTable = "tb_mensagem";
		
		public $hasOne = array(
			"Conversa" => array(
				"className" => "Conversa",
				"Condições" => "",
				"Ordem" => "",
				"Dependente" => true,
				"ForeignKey" => "conversa_id"));
		
		public $belongsTo = array(
			"Conversa" => array(
				"className" => "Conversa",
				"foreignKey" => "conversa_id"));
		
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/
	}
?>