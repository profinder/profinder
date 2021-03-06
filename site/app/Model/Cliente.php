<?php
	App::import('Model','User');
	App::import('Model','Endereco');
	
	class Cliente extends User
	{
		public $name  = 'Cliente'; 
		public $useTable = 'tb_cliente';
		public $primaryKey = 'id';
		
		public $belongsTo = array(
			'Endereco' => array(
				'className' => 'Endereco',
				'foreignKey' => 'endereco_id'));
		
		public $hasMany = array(
	    	'Pedido' => array(
	        	'className' => 'Pedido',
	        	'foreignKey' => 'cliente_id'));
		
    	public $actsAs = array('Inherit'); 
	}
?>