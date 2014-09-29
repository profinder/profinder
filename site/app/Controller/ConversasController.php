<?php
	class ConversasController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('conversas', $this->Conversa->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Conversa inválido'));
			}
	
			$conversa = $this->Conversa->findById($id);
			if (!$conversa) {
				throw new NotFoundException(__('Conversa não encontrado'));
			}
			$this->set('conversa', $conversa);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Conversa->create();
				if ($this->Conversa->saveAssociated($this->request->data))
				{
					$this->Session->setFlash(__('Conversa salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
		// $enderecos = $this->Endereco->Cliente->find('list');
		// $this->set(compact('clientes'));
		
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Conversa inválido'));
			}
		  
			$conversa = $this->Conversa->findById($id);
			if (!$conversa) {
				throw new NotFoundException(__('Conversa não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Conversa->id = $id;
				if ($this->Conversa->save($this->request->data)) {
					$this->Session->setFlash(__('Conversa salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $conversa;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Conversa->delete($id)) {
				$this->Session->setFlash(
				__('Conversa excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>