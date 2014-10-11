<?php
	class Sugestao extends AppModel
	{
		public $useTable = 'tb_sugestao';
		
		public $belongsTo = array(
			'Profissional' => array(
				'className' => 'Profissional',
				'foreignKey' => 'profissional_id'));
		
	}
?>