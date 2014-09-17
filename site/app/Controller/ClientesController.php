<?php
<<<<<<< HEAD
	class ClientesController extends AppController
	{
		public $helpers = array('Html', 'Form');
			
		public function index()
		{
			$this->set('cliente', $this->Cliente->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Cliente inválido'));
			}
	
			$cliente = $this->Cliente->findById($id);
			if (!$cliente) {
				throw new NotFoundException(__('Cliente não encontrada'));
			}
			$this->set('cliente', $cliente);
		}
	
		public function add()
=======
class ClientesController extends AppController {
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
>>>>>>> origin/master
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Cliente->create();
<<<<<<< HEAD
				if ($this->Cliente->save($this->request->data))
				{
					$this->Session->setFlash(__('Cliente salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Cliente inválido'));
			}
		  
			$cliente = $this->Cliente->findById($id);
			if (!$cliente) {
				throw new NotFoundException(__('Cliente não encontrada'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Cliente->id = $id;
				if ($this->Cliente->save($this->request->data)) {
					$this->Session->setFlash(__('Cliente salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $cliente;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Cliente->delete($id)) {
				$this->Session->setFlash(
				__('Cliente excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
=======
				var_dump($this->request->data);
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
		
		var_dump('oi');
		if (! $id) {
			throw new NotFoundException ( __ ( 'Cliente inválido!' ) );
		}
		
		$cliente = $this->Cliente->findById ( $id );
		if (! $cliente) {
			throw new NotFoundException ( __ ( 'Cliente não encontrado' ) );
		}
		$this->layout = 'clean';
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
}
>>>>>>> origin/master
?>