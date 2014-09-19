<?php
App::uses ( 'SimplePasswordHasher', 'Controller/Component/Auth' );
App::import ( 'Model', 'Telefone' );
class User extends AppModel {
	public $useTable = "tb_pessoa";
	public $hasMany = array (
			'Telefone' => array (
					'className' => 'Telefone',
					'foreignKey' => 'pessoa_id' 
			) 
	);
	public $validate = array (
			'nome_pessoa' => array (
					'rule' => 'notEmpty' 
			),
			'username' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'E-mail é obrigatório' 
					)
					/*'email' => array (
							'rule' => array (
									'email',true),
							'message' => 'Insira um email válido.' 
					) */
			),
			
			'password' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'Senha é obrigatório' 
					)
					/*'minimo' => array (
							'rule' => array (
									'minLength',
									'8' 
							),
							'message' => 'Mínimo de 8 caracteres' 
					) 
			) */
	));
	public function beforeSave($options = array()) {
		if (isset ( $this->data [$this->alias] ['password'] )) {
			$passwordHasher = new SimplePasswordHasher ();
			$this->data [$this->alias] ['password'] = $passwordHasher->hash ( $this->data [$this->alias] ['password'] );
		}
		return true;
	}
}
?>