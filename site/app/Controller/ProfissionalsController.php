<?php
	class ProfissionalsController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('profissionals', $this->Profissional->find('all'));
		}
	
		public function view($id_profissional = null) 
		{
			if (!$id_profissional) {
				throw new NotFoundException(__('Usuário inválido'));
			}
	
			$profissional = $this->Profissional->findById($id_profissional);
			if (!$profissional) {
				throw new NotFoundException(__('Usuário não encontrado'));
			}
			$this->set('profissional', $profissional);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Profissional->create();
				if ($this->Profissional->save($this->request->data))
				{
					$this->Session->setFlash(__('Usuário salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id_profissional = null)
		{
			if (!$id_profissional) {
				throw new NotFoundException(__('Profissional inválido'));
			}
		  
			$profissional = $this->Profissional->findById($id_profissional);
			if (!$profissional) {
				throw new NotFoundException(__('Profissional não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Profissional->id = $id_profissional;
				if ($this->Profissional->save($this->request->data)) {
					$this->Session->setFlash(__('Profissional salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $profissional;
			}
		}
	
		public function delete($id_profissional) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Profissional->delete($id_profissional)) {
				$this->Session->setFlash(
				__('Usu�rio excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	
	}
?>