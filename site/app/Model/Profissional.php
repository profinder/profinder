<?php
	App::import('Model','User');
	class Profissional extends User
	{
		public $name  = 'Profissional'; 
		public $useTable = "tb_profissional";
		public $primaryKey = "id";
	
	    public $actsAs = array( 'Inherit' ); 
	}
?>