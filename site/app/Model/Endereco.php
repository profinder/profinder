<?php
	class Endereco extends AppModel
	{
		public $useTable = "tb_endereco";
		
		public $hasMany = array(
	      'Cliente' => array(
	         'className' => 'Cliente',
	         'foreignKey' => 'endereco_id'
	      )
	   );
				
		public $hasMany = array(
	      'Anuncio' => array(
	         'className' => 'Anuncio',
	         'foreignKey' => 'endereco_id'
	      )
	   );	   
	}
?>