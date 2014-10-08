<?php
	class PedidosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('pedidos', $this->Pedido->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Pedido inválido'));
			}
	
			$pedido = $this->Pedido->findById($id);
			if (!$pedido) {
				throw new NotFoundException(__('Pedido não encontrado'));
			}
			$this->set('pedido', $pedido);
		}
		
		public function cadastro()
		{
			$this->layout = 'home';
			if ($this->request->is('post'))
			{
				$this->Pedido->create();
				
				if ($this->Pedido->saveAssociated($this->request->data))
				{
					$this->Session->setFlash(__('Pedido salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
		
		public function editar($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Pedido inválido'));
			}
		  
			$pedido = $this->Pedido->findById($id);
			if (!$pedido) {
				throw new NotFoundException(__('Pedido não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Pedido->id = $id;
				if ($this->Pedido->save($this->request->data)) {
					$this->Session->setFlash(__('Pedido salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $pedido;
			}
		}
	
		public function remover($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Pedido->delete($id)) {
				$this->Session->setFlash(
				__('Pedido excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function clientePedidos($cliente_id = null)
		{
			$this->layout = 'home';
			$sql = $this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido WHERE tb_pedido.cliente_fim = 0 AND tb_pedido.profissional_fim = 0 AND tb_pedido.status_pedido = 'andamento' AND tb_pedido.cliente_id='".$cliente_id."';");
			return $sql;
		}
		
		public function clientePedidosAvaliar($cliente_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido WHERE tb_pedido.cliente_fim = 1 AND tb_pedido.profissional_fim = 1 AND tb_pedido.status_pedido = 'andamento' AND tb_pedido.cliente_id ='".$cliente_id."';");
			return $sql;
		}
		
		public function clientePedidosFinalizados($cliente_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido WHERE tb_pedido.cliente_fim = 1 AND tb_pedido.profissional_fim = 1 AND tb_pedido.status_pedido = 'finalizado' AND tb_pedido.cliente_id='".$cliente_id."';");
			return $sql;
		}
		
		public function profissionalSolicitacaoFinalizarPedido($profissional_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido INNER JOIN tb_anuncio ON tb_anuncio.id = tb_pedido.anuncio_id WHERE tb_pedido.cliente_fim = 1 AND tb_pedido.profissional_fim = 0 AND tb_pedido.status_pedido = 'andamento' AND tb_anuncio.profissional_id = '".$profissional_id."';");
			return $sql;
		}
		
		public function clienteSolicitacaoFinalizarPedido($cliente_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido WHERE tb_pedido.cliente_fim = 0 AND tb_pedido.profissional_fim = 1 AND tb_pedido.status_pedido = 'andamento' AND tb_pedido.cliente_id = '".$cliente_id."';");
			return $sql;
		}
		
		public function profissionalPedidosSolicitados($profissional_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido INNER JOIN tb_anuncio ON tb_pedido.anuncio_id = tb_anuncio.id WHERE tb_pedido.cliente_fim = 0 AND tb_pedido.profissional_fim = 0 AND tb_pedido.status_pedido = 'andamento' AND tb_anuncio.profissional_id ='".$profissional_id."';");
			return $sql;
		}
		
		public function anuncioPedido($pedido_id)
		{
			$sql=$this->Pedido->query("SELECT tb_anuncio.* FROM tb_anuncio INNER JOIN tb_pedido ON tb_anuncio.id = tb_pedido.anuncio_id WHERE tb_pedido.id='".$pedido_id."';");
			return $sql;
		}
		
		public function clienteDadosPedido($pedido_id)
		{
			$sql=$this->Pedido->query("SELECT tb_pessoa.* FROM tb_pessoa INNER JOIN tb_pedido ON tb_pedido.cliente_id = tb_pessoa.id WHERE tb_pedido.id ='".$pedido_id."';");
			return $sql;
		}
		
		public function dadosPedido($pedido_id)
		{
			$sql=$this->Pedido->query("SELECT tb_pessoa.* FROM tb_pessoa INNER JOIN tb_pedido ON tb_pedido.cliente_id = tb_pessoa.id WHERE tb_pedido.id ='".$pedido_id."';");
			return $sql;
		}
		
		public function clienteFinalizarPedido($pedido_id)
		{		
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			$sql = $this->Pedido->query("UPDATE tb_pedido SET tb_pedido.cliente_fim = 1 WHERE tb_pedido.id = '".$pedido_id."';");
			$this->Session->setFlash(__('Pedido finalizado com sucesso.'), "flash_notification");
			
			return $this->redirect(array('action' => 'clientePedidos'));
		}
		
		public function profissionalFinalizarPedido($pedido_id)
		{		
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			$sql = $this->Pedido->query("UPDATE tb_pedido SET tb_pedido.profissional_fim = 1 WHERE tb_pedido.id = '".$pedido_id."';");
			$this->Session->setFlash(__('Pedido finalizado com sucesso.'), "flash_notification");
			
			return $this->redirect(array('action' => 'profissionalSolicitacaoFinalizarPedido'));
		}
		
		public function clienteMensagensPedido($pedido_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("SELECT tb_mensagem.* FROM tb_mensagem INNER JOIN tb_pedido ON tb_mensagem.pedido_id = tb_pedido.id WHERE tb_pedido.id ='".$pedido_id."';");
			return $sql;
		}
		
		public function criarSessao($anuncios = null)
		{
			$this->Session->write('anuncios', $anuncios);
		}
		
		public function salvar_mensagem()
		{
			$this->layout = 'clean';
		}
		
		public function salvarPedido($cliente_id = null, $anuncio_id=null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("insert into tb_pedido (cliente_id, anuncio_id) values(".$cliente_id.", ".$anuncio_id.");");
			return $sql;
		}
		
		public function idPedido($cliente_id = null, $anuncio_id=null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("select tb_pedido.id from tb_pedido where tb_pedido.cliente_id=".$cliente_id." and tb_pedido.anuncio_id=".$anuncio_id.";");
			return $sql;
		}
		
		public function salvarMensagem($pedido_id = null, $mensagem=null)
		{
			$this->layout = 'home';
			$sql=$this->Pedido->query("insert into tb_mensagem (texto_mensagem, pedido_id) values('".$mensagem."', ".$pedido_id.");");
			return $sql;
		}
		
		public function pedidoFinalizado($pedido_id)
		{
			$sql=$this->Pedido->query("UPDATE tb_pedido SET tb_pedido.status_pedido = 'finalizado' WHERE tb_pedido.id = ".$pedido_id.";");
			return $sql;
		}
		
		public function aumentarQntAvaliacao($pedido_id)
		{
			$sql=$this->Pedido->query("UPDATE tb_pedido SET tb_pedido.qnt_avaliacao = tb_pedido.qnt_avaliacao +1 WHERE tb_pedido.id =".$pedido_id.";");
			return $sql;
		}
	}
?>