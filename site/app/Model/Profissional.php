<?php
	App::import('Model','User');
	class Profissional extends User
	{
		public $name  = 'Profissional'; 
		public $useTable = "tb_profissional";
		public $primaryKey = "id";
	
	    public $actsAs = array( 'Inherit' ); 
	
		public $hasMany = array(
			"Anuncio" => array(
				"className" => "Anuncio",
				"foreignKey" => "profissional_id"),
			"Sugestao" => array(
				"className" => "Sugestao",
				"foreignKey" => "profissional_id")
		);
			
	}
?>