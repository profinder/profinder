<?php
	class BairrosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('bairros', $this->Bairro->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Bairro inválido'));
			}
	
			$bairro = $this->Bairro->findById($id);
			if (!$bairro) {
				throw new NotFoundException(__('Bairro não encontrado'));
			}
			$this->set('bairro', $bairro);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Bairro->create();
				if ($this->Bairro->save($this->request->data))
				{
					$this->Session->setFlash(__('Bairro salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Bairro inválido'));
			}
		  
			$bairro = $this->Bairro->findById($id);
			if (!$bairro) {
				throw new NotFoundException(__('Bairro não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Bairro->id = $id;
				if ($this->Bairro->save($this->request->data)) {
					$this->Session->setFlash(__('Bairro salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $bairro;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Bairro->delete($id)) {
				$this->Session->setFlash(
				__('Bairro excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>