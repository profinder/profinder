<?php
	class Pedido extends AppModel
	{
		public $useTable = 'tb_pedido';
		
		public $hasOne = array(
			'Anuncio' => array(
				'className' => 'Anuncio',
				'Condições' => '',
				'Ordem' => '',
				'Dependente' => true,
				'ForeignKey' => 'anuncio_id'),
			'Conversa' => array(
				'className' => 'Conversa',
				'Condições' => '',
				'Ordem' => '',
				'Dependente' => true,
				'ForeignKey' => 'pedido_id'));
		
		public $belongsTo = array(
	   		'Cliente' => array(
	        	'className' => 'Cliente',
	            'foreignKey' => 'cliente_id'));
		
		/*public $validate = array(
				'numero_endereco' => array(
						'rule' => 'notEmpty')
		);*/
	}
?>