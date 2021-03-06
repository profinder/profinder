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
				'foreignKey' => 'anuncio_id'),
		);
		
		public $hasMany = array(
			'Mensagem' => array(
				'className' => 'Mensagem',
				'foreignKey' => 'pedido_id')
		);
		
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