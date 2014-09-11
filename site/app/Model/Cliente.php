<?php
	App::import('Model','User');
	App::import('Model','Endereco');
	class Cliente extends User
	{
		public $name  = 'Cliente'; 
		public $useTable = "tb_cliente";
		public $primaryKey = "id";
		
		public $belongsTo = array ("Endereco" =>
								array("className" => "Endereco",
								"ForeignKey" => "endereco_id"));
		
		
		/*public $hasOne = "Endereco";/*array(
	      'Endereco' => array(
	         'className' => 'Endereco',
	         'foreignKey' => 'id',
	         'dependent' => true
	      )
	   );*/
		
		
	    public $actsAs = array( 'Inherit' ); 
	}
?>