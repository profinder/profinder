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
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Pedido->create();
				if ($this->Pedido->saveAssociated($this->request->data))
				{
					$this->Session->setFlash(__('Pedido salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
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