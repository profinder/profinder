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

					return $this->redirect(array('controller' => 'Pedidos', 'action' => 'clientePedidosAvaliar'));

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
		
		public function comentariosAvaliacao($anuncio_id)
		{
			$sql=$this->Comentario->query("SELECT tb_comentario.* FROM tb_comentario INNER JOIN tb_avaliacao ON tb_comentario.avaliacao_id = tb_avaliacao.id INNER JOIN tb_pedido ON tb_avaliacao.pedido_id = tb_pedido.id INNER JOIN tb_anuncio ON tb_anuncio.id = tb_pedido.anuncio_id WHERE tb_anuncio.id =".$anuncio_id.";");
			return $sql;
		}
		
		public function clienteComentario($comentario_id)
		{
			$sql=$this->Comentario->query("SELECT tb_pessoa.* FROM tb_comentario INNER JOIN tb_avaliacao ON tb_comentario.avaliacao_id = tb_avaliacao.id INNER JOIN tb_pedido ON tb_avaliacao.pedido_id = tb_pedido.id INNER JOIN tb_cliente ON tb_cliente.id = tb_pedido.cliente_id INNER JOIN tb_pessoa ON tb_pessoa.id = tb_cliente.id WHERE tb_comentario.id =".$comentario_id.";");
			return $sql;
		}
		
		public function buscarAvaliacaoComentario($id_comentario) 
		{
			$sql=$this->Comentario->query('SELECT tb_avaliacao.nota_avaliacao FROM tb_avaliacao INNER JOIN tb_comentario ON tb_comentario.avaliacao_id = tb_avaliacao.id WHERE tb_comentario.id = '.$id_comentario.';');
			return $sql;
		}
	}
?>