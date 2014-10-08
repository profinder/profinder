<?php
	class Avaliacao extends AppModel
	{
		public $useTable = "tb_avaliacao";
		
		public $hasMany = array (
			'Comentario' => array (
					'className' => 'Comentario',
					'foreignKey' => 'avaliacao_id' 
		));
	}
?>