<?php
	class Conversa extends AppModel
	{
		public $useTable = "tb_conversa";
		
		public $belongsTo = array(
			"Pedido" => array(
				"className" => "Pedido",
				"foreignKey" => "pedido_id"));
		
		public $hasMany = array(
			'Mensagem' => array(
	        	'className' => 'Mensagem',
	         	'foreignKey' => 'conversa_id'));
		
		
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/	
	}
?>