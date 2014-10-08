<?php
	class ComentariosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('comentarios', $this->Comentario->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Comentario inválido'));
			}
	
			$comentario = $this->Comentario->findById($id);
			if (!$comentario) {
				throw new NotFoundException(__('Comentario não encontrado'));
			}
			$this->set('comentario', $comentario);
		}
	
		public function cadastro()
		{
			App::import('Controller', 'Avaliacaos');
			$avalicao = new AvaliacaosController;
			$avalicao->constructClasses();
			$id_pedido = $this->Session->read('pedido_id');
			$voto = $this->Session->read('voto');
			$sqlavaliaco=$avalicao->salvarAvaliacao($voto, $id_pedido);
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Comentario->create();
				if ($this->Comentario->saveAssociated($this->request->data))
				{
					
					$this->Session->setFlash(__('Comentario salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('controller'=>'Pages','action' => 'cliente_home'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
		// $enderecos = $this->Endereco->Cliente->find('list');
		// $this->set(compact('clientes'));
		
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Comentario inválido'));
			}
		  
			$comentario = $this->Comentario->findById($id);
			if (!$comentario) {
				throw new NotFoundException(__('Comentario não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Comentario->id = $id;
				if ($this->Comentario->save($this->request->data)) {
					$this->Session->setFlash(__('Comentario salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $comentario;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Comentario->delete($id)) {
				$this->Session->setFlash(
				__('Comentario excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>