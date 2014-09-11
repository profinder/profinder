<?php
	class Categoria extends AppModel
	{
		public $useTable = "tb_categoria";
		
		public $validate = array(
				'nome_categoria' => array(
						'rule' => 'notEmpty')
		);	
	}
?>