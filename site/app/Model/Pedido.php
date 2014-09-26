<?php
	class Pedido extends AppModel
	{
		public $useTable = "tb_pedido";
		
		public $hasOne = array(
			"Cliente" => array(
				"className" => "Cliente",
				"Condições" => "",
				"Ordem" => "",
				"Dependente" => true,
				"ForeignKey" => "cliente_id"
			),
			"Anuncio" => array(
				"className" => "Anuncio",
				"Condições" => "",
				"Ordem" => "",
				"Dependente" => true,
				"ForeignKey" => "anuncio_id"),
			
		);
		
		public $belongsTo = array ("Conversa" =>
								array("className" => "Conversa",
								"foreignKey" => "pedido_id"));
		
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/
		
		
	}
?>