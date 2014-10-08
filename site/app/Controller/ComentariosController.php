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
				throw new NotFoundException(__('Comentário inválida'));
			}
	
			$comentario = $this->Comentario->findById($id);
			if (!$comentario) {
				throw new NotFoundException(__('Comentário não encontrada'));
			}
			$this->set('comentario', $comentario);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Comentario->create();
				if ($this->Comentario->save($this->request->data))
				{
					$this->Session->setFlash(__('Comentário salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Comentário inválida'));
			}
		  
			$comentario = $this->Comentario->findById($id);
			if (!$comentario) {
				throw new NotFoundException(__('Comentário não encontrada'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Comentario->id = $id;
				if ($this->Comentario->save($this->request->data)) {
					$this->Session->setFlash(__('Comentário salvo com sucesso'),
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
				__('Comentário excluida com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	
		public function comentariosAvaliacao($anuncio_id)
		{
			var_dump($anuncio_id);
			$sql=$this->Comentario->query("SELECT tb_comentario.* FROM tb_comentario INNER JOIN tb_avaliacao ON tb_comentario.avaliacao_id = tb_avaliacao.id INNER JOIN tb_pedido ON tb_avaliacao.pedido_id = tb_pedido.id INNER JOIN tb_anuncio ON tb_anuncio.id = tb_pedido.anuncio_id WHERE tb_anuncio.id ='.$anuncio_id.';");
			var_dump($sql);
			return $sql;
		}
	}
?>