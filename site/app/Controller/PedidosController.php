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
	
	public function add() {
		$this->layout = 'clean';
		if (! empty ( $this->request->data )) {
			// We can save the User data:
			// it should be in $this->request->data['User']
			
			$pedido = $this->Pedido->save($this->request->data );
			
			// If the user was saved, Now we add this information to the data
			// and save the Profile.
			
			if (! empty ( $pedido )) {
				// The ID of the newly created user has been set
				// as $this->User->id.
				$this->request->data ['Conversa'] ['pedido_id'] = $this->Pedido->id;
				
				// Because our User hasOne Profile, we can access
				// the Profile model through the User model:
				$this->Pedido->Conversa->Mensagem->save($this->request->data);
				
				//$this->request->data ['Telefone'] ['pessoa_id'] = $this->Cliente->id;
				//$this->Cliente->Telefone->save ( $this->request->data );
			}
		}
		// $enderecos = $this->Endereco->Cliente->find('list');
		// $this->set(compact('clientes'));
	}
	
		public function edit($id = null)
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
	
		public function delete($id) 
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
		
		public function pedidosClienteFinalizados($cliente_id)
		{
			$sql=$this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido WHERE tb_pedido.cliente_fim = 1 AND tb_pedido.prof_fim = 1 AND tb_pedido.cliente_id='".$cliente_id."';");
			return $sql;
		}
		
		public function pedidosClienteAndamento($cliente_id)
		{
			$sql=$this->Pedido->query("SELECT tb_pedido.* FROM tb_pedido WHERE tb_pedido.cliente_fim = 0 AND tb_pedido.prof_fim = 0 AND tb_pedido.cliente_id='".$cliente_id."';");
			return $sql;
		}
		
		public function pedidoAnuncio($pedido_id)
		{
			$sql=$this->Pedido->query("SELECT tb_anuncio.* FROM tb_anuncio INNER JOIN tb_pedido ON tb_anuncio.id = tb_pedido.anuncio_id WHERE tb_pedido.id='".$pedido_id."';");
			return $sql;
		}
		
		public function finalizarPedido($pedido_id)
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			$sql=$this->Pedido->query("UPDATE tb_pedido SET tb_pedido.cliente_fim = 1 WHERE tb_pedido.id = '".$pedido_id."';");
			
			var_dump($sql);
			return $sql;
		}
		
		public function mensagensPedido($pedido_id)
		{
			$sql=$this->Pedido->query("SELECT tb_mensagem.* FROM tb_mensagem INNER JOIN tb_conversa ON tb_mensagem.conversa_id = tb_conversa.id WHERE tb_conversa.pedido_id ='".$pedido_id."';");
		//	var_dump($sql);
			return $sql;
		}
	}
?>