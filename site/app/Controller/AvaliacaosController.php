<?php
	class AvaliacaosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('avaliacoes', $this->Avaliacao->find('all'));
		}
	
		public function view($id = null) 
		{
			if (!$id) {
				throw new NotFoundException(__('Avaliacao inválido'));
			}
	
			$avaliacao = $this->Avaliacao->findById($id);
			if (!$avaliacao) {
				throw new NotFoundException(__('Avaliacao não encontrado'));
			}
			$this->set('avaliacao', $avaliacao);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Avaliacao->create();
				if ($this->Avaliacao->save($this->request->data))
				{
					$this->Session->setFlash(__('Avaliacao salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Avaliacao inválido'));
			}
		  
			$avaliacao = $this->Avaliacao->findById($id);
			if (!$avaliacao) {
				throw new NotFoundException(__('Avaliacao não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Avaliacao->id = $id;
				if ($this->Avaliacao->save($this->request->data)) {
					$this->Session->setFlash(__('Avaliacao salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $avaliacao;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Servico->delete($id)) {
				$this->Session->setFlash(
				__('Avaliacao excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function cadastro($voto, $id_pedido) 
		{
			$sql=$this->Avaliacao->query('replace INTO tb_avaliacao(pedido_id, nota_avaliacao) VALUES ('.$id_pedido.','.$voto.');');
		
			return $sql;
		}
		
		public function salvarAvaliacao($voto, $id_pedido) 
		{
			//var_dump("oi");
			$sql=$this->Avaliacao->query('insert INTO tb_avaliacao(pedido_id, nota_avaliacao) VALUES ('.$id_pedido.','.$voto.');');
			
			return $sql;
		}
		
		public function idAvaliacao() 
		{
			//var_dump("oi");
			$sql=$this->Avaliacao->query('select tb_avaliacao.id from tb_avaliacao order by id desc limit 1;');
			
			return $sql;
		}
		
		
		public function salvarPedido($id_pedido) 
		{
			$this->Session->write('pedido_id', $id_pedido);
		}
		
		public function salvarVoto($voto)
		{
			$this->Session->write('voto', $voto);
		}
		
		public function buscarAvaliacao($id_anuncio) 
		{
			$sql=$this->Avaliacao->query('select sum(tb_avaliacao.nota_avaliacao) from tb_avaliacao inner join tb_pedido on tb_avaliacao.pedido_id=tb_pedido.id where tb_pedido.anuncio_id='.$id_anuncio.';');
			return $sql;
		}
		
		public function quantidadeAvaliacao($id_anuncio) 
		{
			$sql=$this->Avaliacao->query('select count(tb_avaliacao.nota_avaliacao) from tb_avaliacao inner join tb_pedido on tb_avaliacao.pedido_id=tb_pedido.id where tb_pedido.anuncio_id='.$id_anuncio.';');
			return $sql;
		}
		
		public function avaliarPedido() 
		{
			$this->layout='home';
		}
	}
?>