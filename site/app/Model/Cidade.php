<?php
	class Cidade extends AppModel
	{
		public $useTable = "tb_cidade";
		
		public $validate = array(
				'nome_cidade' => array(
						'rule' => 'notEmpty')
		);
	}
?>