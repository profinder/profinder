<?php
	class PedidosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('pedidos', $this->Pedido->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Pedido inválido'));
			}
	
			$pedido = $this->Pedido->findById($id);
			if (!$pedido) {
				throw new NotFoundException(__('Pedido não encontrado'));
			}
			$this->set('pedido', $pedido);
		}
	
	public function add() {
		$this->layout = 'clean';
		if (! empty ( $this->request->data )) {
			// We can save the User data:
			// it should be in $this->request->data['User']
			
			$pedido = $this->Pedido->save($this->request->data );
			
			// If the user was saved, Now we add this information to the data
			// and save the Profile.
			
			if (! empty ( $pedido )) {
				// The ID of the newly created user has been set
				// as $this->User->id.
				$this->request->data ['Conversa'] ['pedido_id'] = $this->Pedido->id;
				
				// Because our User hasOne Profile, we can access
				// the Profile model through the User model:
				$this->Pedido->Conversa->Mensagem->save($this->request->data);
				
				//$this->request->data ['Telefone'] ['pessoa_id'] = $this->Cliente->id;
				//$this->Cliente->Telefone->save ( $this->request->data );
			}
		}
		// $enderecos = $this->Endereco->Cliente->find('list');
		// $this->set(compact('clientes'));
	}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Pedido inválido'));
			}
		  
			$pedido = $this->Pedido->findById($id);
			if (!$pedido) {
				throw new NotFoundException(__('Pedido não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Pedido->id = $id;
				if ($this->Pedido->save($this->request->data)) {
					$this->Session->setFlash(__('Pedido salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $pedido;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Pedido->delete($id)) {
				$this->Session->setFlash(
				__('Pedido excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>