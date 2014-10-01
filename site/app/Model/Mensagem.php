<?php
	class Mensagem extends AppModel
	{
		public $useTable = "tb_mensagem";
		
		public $belongsTo = array(
			"Pedido" => array(
				"className" => "Pedido",
				"foreignKey" => "pedido_id"));
		
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/
	}
?>