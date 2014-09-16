<?php
	class Endereco extends AppModel
	{
		public $useTable = "tb_endereco";
		
		public $belongsTo = array(
	      'Cliente' => array(
	         'className' => 'Cliente',
	         'foreignKey' => 'endereco_id'
	      )
	   );
				
		
		
	}
?>