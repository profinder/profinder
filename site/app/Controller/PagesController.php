<?php
	App::uses('AppController', 'Controller');
	App::uses('CategoriasController', 'Controller');
	
	class PagesController extends AppController 
	{
		public $uses = array();
	
		public function display() 
		{
			$this->layout = 'home';
			$path = func_get_args();
			$count = count($path);
			if (!$count) {
				return $this->redirect('/');
			}
			$page = $subpage = $title_for_layout = null;
	
			if (!empty($path[0])) {
				$page = $path[0];
			}
			if (!empty($path[1])) {
				$subpage = $path[1];
			}
			if (!empty($path[$count - 1])) {
				$title_for_layout = Inflector::humanize($path[$count - 1]);
			}
			$this->set(compact('page', 'subpage', 'title_for_layout'));
	
			try {
				$this->render(implode('/', $path));
			} catch (MissingViewException $e) {
				if (Configure::read('debug')) {
					throw $e;
				}
				throw new NotFoundException();
			}
			//$this->set('categorias', $this->Categoria->find('all'));	
		}
		
		public function perfilCliente()
		{
		}
		
		public function editarCliente($id = null)
		{
			/*App::import('Controller', 'Clientes');
			$clientes = new ClientesController;
			$clientes->constructClasses();
			return $clientes->edit($id);*/
			//return $this->redirect('editar_cliente');
		}

		public function homeProfissional()
		{
		}
	
		public function isAuthorized($user) 
		{
			return parent::isAuthorized($user);
		}
		
		public function nomeCategorias() 
		{
			App::import('Controller', 'Categorias');
			$categorias = new CategoriasController;
			$categorias->constructClasses();
			return $categorias->nomeCategorias();
		}
		
		public function nomeServicos($id_categoria) 
		{
			App::import('Controller', 'Servicos');
			$servicos = new ServicosController;
			$servicos->constructClasses();
			return $servicos->nomeServicos($id_categoria);	
		}
		
		public function idServico($nome_servico)
		{
			App::import('Controller', 'Servicos');
			$servicos = new ServicosController;
			$servicos->constructClasses();
			return $servicos->idServico($nome_servico);	
		}
		
		public function anuncios()
		{
			$servico = $_GET["serv"];	
			App::import('Controller', 'Anuncios');
			$anuncios = new AnunciosController;
			$anuncios->constructClasses();
			return $anuncios->anuncios($servico);	
		}
		
		public function anunciosProfissional($profissional_id) 
		{
			App::import('Controller', 'Anuncios');
			$anunciosProfissional = new AnunciosController;
			$anunciosProfissional->constructClasses();
			return $anunciosProfissional->anunciosProfissional($profissional_id);	
		}
		
		public function pedidosCliente($cliente_id) 
		{
			App::import('Controller', 'Pedidos');
			$pedidosCliente = new PedidosController;
			$pedidosCliente->constructClasses();
			return $pedidosCliente->pedidosClienteAndamento($cliente_id);	
		}
		
		public function pedidosClienteFinalizados($cliente_id) 
		{
			App::import('Controller', 'Pedidos');
			$pedidosClienteFinalizados = new PedidosController;
			$pedidosClienteFinalizados->constructClasses();
			return $pedidosClienteFinalizados->pedidosClienteFinalizados($cliente_id);	
		}
		
		public function mensagensPedido($pedido_id) 
		{
			App::import('Controller', 'Pedidos');
			$mensagensPedido = new PedidosController;
			$mensagensPedido->constructClasses();
			return $mensagensPedido->mensagensPedido($pedido_id);	
		}
		
		public function pedidoAnuncio($pedido_id) 
		{
			App::import('Controller', 'Pedidos');
			$pedidoAnuncio = new PedidosController;
			$pedidoAnuncio->constructClasses();
			return $pedidoAnuncio->pedidoAnuncio($pedido_id);	
		}
		
		public function finalizarPedido($pedido_id) 
		{
			App::import('Controller', 'Pedidos');
			$finalizarPedido = new PedidosController;
			$finalizarPedido->constructClasses();
			return $finalizarPedido->finalizarPedido($pedido_id);	
		}
		
		public function enderecoAnuncio($anuncio_id) 
		{
			App::import('Controller', 'Anuncios');
			$anuncios = new AnunciosController;
			$anuncios->constructClasses();
			return $anuncios->enderecoAnuncio($anuncio_id);	
		}
		
		public function removerAnuncio($anuncio_id) 
		{
			App::import('Controller', 'Anuncios');
			$anuncios = new AnunciosController;
			$anuncios->constructClasses();
			return $anuncios->remover($anuncio_id);	
		}
		
		public function anunciosServico($servico_id) 
		{
			App::import('Controller', 'Anuncios');
			$anuncios = new AnunciosController;
			$anuncios->constructClasses();
			return $anuncios->anunciosServico($servico_id);	
		}
		
		public function email($username) 
		{
			App::import('Controller', 'Clientes');
			$cliente = new ClientesController;
			$cliente->constructClasses();
			return $cliente->email($username);	
		}
		
		public function solicitarPedido()
		{
			
		}
				
		public function beforeFilter() 
		{
			$this->Auth->allow('homeCliente', 'homeProfissional', 'display');
		}
	}
?>