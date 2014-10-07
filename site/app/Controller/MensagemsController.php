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
			if ($this->request->is('post'))
			{
				$this->Mensagem->create();
					
				if ($this->Mensagem->save($this->request->data))
				{
					$this->Session->setFlash(__('Mensagem salvo com sucesso!'), "flash_notification");
					return $this->redirect($this->referer());
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
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
		
		public function profissionalMensagensPedido($pedido_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Mensagem->query("SELECT tb_mensagem.* FROM tb_mensagem INNER JOIN tb_pedido ON tb_mensagem.pedido_id = tb_pedido.id WHERE tb_pedido.id ='".$pedido_id."';");
			return $sql;
		}
		
		public function profissionalEnviou($mensagem_id = null)
		{
			$sql=$this->Mensagem->query("SELECT tb_pessoa.* FROM tb_pessoa INNER JOIN tb_profissional ON tb_profissional.id = tb_pessoa.id INNER JOIN tb_anuncio ON tb_anuncio.profissional_id = tb_profissional.id INNER JOIN tb_pedido ON tb_pedido.anuncio_id = tb_anuncio.id INNER JOIN tb_mensagem ON tb_mensagem.pedido_id = tb_pedido.id WHERE tb_mensagem.id ='".$mensagem_id."' AND tb_mensagem.quem_enviou = 'profissional';");
			return $sql;
		}
		
		public function clienteEnviou($mensagem_id = null)
		{
			
			$sql=$this->Mensagem->query("SELECT tb_pessoa.* FROM tb_pessoa INNER JOIN tb_cliente ON tb_cliente.id = tb_pessoa.id INNER JOIN tb_pedido ON tb_pedido.cliente_id = tb_cliente.id INNER JOIN tb_mensagem ON tb_mensagem.pedido_id = tb_pedido.id WHERE tb_mensagem.quem_enviou = 'cliente' AND tb_mensagem.id ='".$mensagem_id."';");
			return $sql;
		}
	}
?>