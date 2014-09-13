<?php
	class ClientesController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('clientes', $this->Cliente->find('all'));
		}
	
		public function view($id_cliente = null) 
		{
			if (!$id_cliente) {
				throw new NotFoundException(__('Usuário inválido'));
			}
	
			$cliente = $this->Cliente->findById($id_cliente);
			if (!$cliente) {
				throw new NotFoundException(__('Usuário não encontrado'));
			}
			$this->set('cliente', $cliente);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Cliente->create();
				if ($this->Cliente->save($this->request->data))
				{
					$this->Session->setFlash(__('Usuário salvo com sucesso!'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id_cliente = null)
		{
			if (!$id_cliente) {
				throw new NotFoundException(__('Cliente inválido!'));
			}
		  
			$cliente = $this->Cliente->findById($id_cliente);
			if (!$cliente) {
				throw new NotFoundException(__('Cliente não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Cliente->id = $id_cliente;
				if ($this->Cliente->save($this->request->data)) {
					$this->Session->setFlash(__('Cliente salvo com sucesso!'),
		    					"flash_notification");
					return $this->redirect(array('controller' => 'cliente', 'action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		  /*
			if (!$this->request->data) {
				$this->request->data = $cliente;
			}*/
		}
	
		public function delete($id_cliente) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Cliente->delete($id_cliente)) {
				$this->Session->setFlash(
				__('Usuário excluido com sucesso!', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>