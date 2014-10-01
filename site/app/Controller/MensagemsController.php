<?php
	class MensagemsController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('mensagens', $this->Mensagem->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Mensagem inválido'));
			}
	
			$mensagem = $this->Mensagem->findById($id);
			if (!$mensagem) {
				throw new NotFoundException(__('Mensagem não encontrado'));
			}
			$this->set('mensagem', $mensagem);
		}
	
	public function add()
			{
				$this->layout = 'clean';
				
				if ($this->request->is('post'))
				{
					$this->Mensagem->create();
					
					if ($this->Mensagem->save($this->request->data))
					{
						$this->Session->setFlash(__('Mensagem salvo com sucesso!'), "flash_notification");
						return $this->redirect(array('action' => 'index'));
					
					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				//$enderecos = $this->Endereco->Cliente->find('list');
	         	//$this->set(compact('clientes'));
			}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Mensagem inválido'));
			}
		  
			$mensagem = $this->Mensagem->findById($id);
			if (!$mensagem) {
				throw new NotFoundException(__('Mensagem não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Mensagem->id = $id;
				if ($this->Mensagem->save($this->request->data)) {
					$this->Session->setFlash(__('Mensagem salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $mensagem;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Mensagem->delete($id)) {
				$this->Session->setFlash(
				__('Mensagem excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>