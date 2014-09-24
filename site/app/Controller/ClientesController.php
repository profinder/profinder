<?php

	App::uses('CakeEmail', 'Network/Email');
	class ClientesController extends AppController 
	{
		public $helpers = array (
				'Html',
				'Form' 
		);
		
		public function index() {
			$this->set ( 'clientes', $this->Cliente->find ( 'all' ) );
		}
		
		public function view($id_cliente = null) {
			if (! $id_cliente) {
				throw new NotFoundException ( __ ( 'Usuário inválido' ) );
			}
			
			$cliente = $this->Cliente->findById ( $id_cliente );
			if (! $cliente) {
				throw new NotFoundException ( __ ( 'Usuário não encontrado' ) );
			}
			$this->set ( 'cliente', $cliente );
		}
		
		public function add()
			{
				$this->layout = 'clean';
				if ($this->request->is('post'))
				{
					$this->Cliente->create();
					//var_dump($this->request->data);
					if ($this->Cliente->saveAssociated($this->request->data))
					{
						$this->Session->setFlash(__('Cliente salvo com sucesso.'), "flash_notification");
						return $this->redirect($this->referer());
					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				//$enderecos = $this->Endereco->Cliente->find('list');
	         	//$this->set(compact('clientes'));
			}
			
		public function edit($id = null) {
			
			$this->layout = 'clean';
			var_dump('oi');
			if (! $id) {
				throw new NotFoundException ( __ ( 'Cliente inválido!' ) );
			}
			
			$cliente = $this->Cliente->findById ( $id );
			if (! $cliente) {
				throw new NotFoundException ( __ ( 'Cliente não encontrado' ) );
			}
			
			if ($this->request->is ( array (
					'post',
					'put' 
			) )) {
				
				$this->Cliente->id = $id;
				if ($this->Cliente->save ( $this->request->data )) {
					$this->Session->setFlash ( __ ( 'Cliente salvo com sucesso!' ), "flash_notification" );
					/*return $this->redirect ( array (
							'controller' => 'cliente',
							'action' => 'index' 
					) );*/
				}
				$this->Session->setFlash ( __ ( 'Erro ao salvar dados!' ) );
			}
			/*
			 * if (!$this->request->data) { $this->request->data = $cliente; }
			 */
		}
		public function delete($id_cliente) {
			if ($this->request->is ( 'get' )) {
				throw new MethodNotAllowedException ();
			}
			
			if ($this->Cliente->delete ( $id_cliente )) {
				$this->Session->setFlash ( __ ( 'Usuário excluido com sucesso!', "flash_notification" ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
		}
		
		public function email($username=null)
		{
			var_dump($username);
			$Email = new CakeEmail('gmail');
			$Email->to('mariih97@gmail.com');
			$Email->subject('Automagically generated email');
			$Email->replyTo('profindertcc@gmail.com');
			$Email->message('teste');
			$Email->from('profindertcc@gmail.com');
			$Email->send();
			//return $this->redirect(array('action' => 'index'));
		}
	}
?>