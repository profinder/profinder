<?php
	class Comentario extends AppModel
	{
		public $useTable = 'tb_comentario';
		
		public $belongsTo = array ("Avaliacao" =>
									array("className" => "Avaliacao",
									"foreignKey" => "avaliacao_id"));
	}
?>