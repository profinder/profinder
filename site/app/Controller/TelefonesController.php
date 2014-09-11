<?php
	class TelefonesController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('telefones', $this->Telefone->find('all'));
		}
	
		public function view($id = null) 
		{
			if (!$id) {
				throw new NotFoundException(__('Telefone inválido'));
			}
	
			$telefone = $this->Telefone->findById($id);
			if (!$telefone) {
				throw new NotFoundException(__('Telefone não encontrado'));
			}
			$this->set('telefone', $telefone);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Telefone->create();
				if ($this->Telefone->save($this->request->data))
				{
					$this->Session->setFlash(__('Telefone salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Telefone inválido'));
			}
		  
			$telefone = $this->Telefone->findById($id);
			if (!$telefone) {
				throw new NotFoundException(__('Telefone não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Telefone->id = $id;
				if ($this->Telefone->save($this->request->data)) {
					$this->Session->setFlash(__('Telefone salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $telefone;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Servico->delete($id)) {
				$this->Session->setFlash(
				__('Servico excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>