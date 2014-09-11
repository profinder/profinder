<?php
	App::import('Model','User');
	class Telefone extends AppModel
	{
		public $useTable = "tb_telefone";
		
		public $belongsTo = array ("User" =>
									array("className" => "User",
									"ForeignKey" => "user_id"));
	}
?>