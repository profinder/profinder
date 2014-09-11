<?php
	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
	
	class Servico extends AppModel
	{
		public $useTable = "tb_servico";
		
		public $validate = array(
				'id_categoria' => array(
						'rule' => 'notEmpty'),
				'nome_servico' => array(
						'required' => array(
								'rule' => array('notEmpty'),
								'message' => 'Nome é obrigatório'))
		);
	}
?>