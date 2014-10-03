<?php
	class FotosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		/*public function index()
		{
			$this->set('fotos', $this->Servico->find('all'));
		}*/
	
		public function view($id = null) 
		{
			if (!$id) {
				throw new NotFoundException(__('Foto inválida'));
			}
	
			$foto = $this->Foto->findById($id);
			if (!$foto) {
				throw new NotFoundException(__('Foto não encontrada'));
			}
			$this->set('foto', $foto);
		}
	
		public function cadastro()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Foto->create();
				if ($this->Foto->save($this->request->data))
				{
					$this->Session->setFlash(__('Foto salva com sucesso!'), "flash_notification");
					return $this->redirect(array('controller' => 'profissionals', 'action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Foto inválido'));
			}
		  
			$foto = $this->Foto->findById($id);
			if (!$foto) {
				throw new NotFoundException(__('Foto não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Foto->id = $id;
				if ($this->Foto->save($this->request->data)) {
					$this->Session->setFlash(__('Foto salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $foto;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Foto->delete($id)) {
				$this->Session->setFlash(
				__('Foto excluída com sucesso!', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
