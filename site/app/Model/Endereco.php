<?php
	class Endereco extends AppModel
	{
		public $useTable = "tb_endereco";
		
		public $hasMany = array(
	      'Cliente' => array(
	         'className' => 'Cliente',
	         'foreignKey' => 'endereco_id'
	      ),
	      'Anuncio' => array(
	         'className' => 'Anuncio',
	         'foreignKey' => 'endereco_id'
	      )
	   );	  


		public $validate = array(
				'cep' => array(
						//'numeric' => array('message' => 'Insira apensa números'),
						'required' => array(
								'rule' => array('notEmpty'),
								'message' => 'CEP é obrigatório!'),
				),
				'logradouro' => array(
						'required' => array(
								'rule' => array('notEmpty'),
								'message' => 'Logradouro é obrigatório!')),
				'localidade' => array(
						'required' => array(
								'rule' => array('notEmpty'),
								'message' => 'Cidade é obrigatório!')),
				'bairro' => array(
						'required' => array(
								'rule' => array('notEmpty'),
								'message' => 'Bairro é obrigatório!')),
				'cidade' => array(
						'required' => array(
								'rule' => array('notEmpty'),
								'message' => 'Cidade é obrigatório')),
				'numero_endereco' => array(
						'required' => array(
								'rule' => array('notEmpty'),
								'message' => 'Número é obrigatório')),
		
		);
		
	}
?>