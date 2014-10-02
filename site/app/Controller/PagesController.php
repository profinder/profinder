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
		
		public function isAuthorized($user) 
		{
			return parent::isAuthorized($user);
		}
		
		public function clientePerfil()
		{
		}
		
		public function clienteEditar($id = null)
		{
			/*App::import('Controller', 'Clientes');
			$clientes = new ClientesController;
			$clientes->constructClasses();
			return $clientes->edit($id);*/
			//return $this->redirect('editar_cliente');
		}
		
		public function clientePedidoAnuncio($pedido_id) 
		{
			App::import('Controller', 'Pedidos');
			$pedidoAnuncio = new PedidosController;
			$pedidoAnuncio->constructClasses();
			return $pedidoAnuncio->pedidoAnuncio($pedido_id);	
		}
		
		public function clienteFinalizarPedido($pedido_id) 
		{
			App::import('Controller', 'Pedidos');
			$finalizarPedido = new PedidosController;
			$finalizarPedido->constructClasses();
			var_dump($pedido_id);
			return $finalizarPedido->finalizarPedido($pedido_id);	
		}
		
		public function clienteDadosPedido($pedido_id) 
		{
			App::import('Controller', 'Pedidos');
			$dadosClientePedido = new PedidosController;
			$dadosClientePedido->constructClasses();
			return $dadosClientePedido->dadosClientePedido($pedido_id);	
		}

		public function clienteSolicitarPedido()
		{
		}
		
		public function clientePedidos($cliente_id) 
		{
			App::import('Controller', 'Pedidos');
			$pedidosClienteFinalizados = new PedidosController;
			$pedidosClienteFinalizados->constructClasses();
			return $pedidosClienteFinalizados->pedidosClienteAndamento($cliente_id);	
		}
		
		public function clientePedidosFinalizados($cliente_id) 
		{
			App::import('Controller', 'Pedidos');
			$pedidosClienteFinalizados = new PedidosController;
			$pedidosClienteFinalizados->constructClasses();
			return $pedidosClienteFinalizados->pedidosClienteFinalizados($cliente_id);	
		}
		
		public function clientePedidosAvaliar($cliente_id)
		{
			App::import('Controller', 'Pedidos');
			$clientePedidosAvaliar = new PedidosController;
			$clientePedidosAvaliar->constructClasses();
			return $clientePedidosAvaliar->clientePedidosDisponiveisAvaliar($cliente_id);
		}
		
		public function clienteAnunciosServico($servico_id) 
		{
			App::import('Controller', 'Anuncios');
			$anuncios = new AnunciosController;
			$anuncios->constructClasses();
			return $anuncios->anunciosServico($servico_id);	
		}
		
		public function profissionalHome()
		{
		}
		
		public function profissionalAnuncios($profissional_id) 
		{
			App::import('Controller', 'Anuncios');
			$anunciosProfissional = new AnunciosController;
			$anunciosProfissional->constructClasses();
			return $anunciosProfissional->anunciosProfissional($profissional_id);	
		}
		
		public function profissionalPedidosSolicitados($profissional_id) 
		{
			App::import('Controller', 'Pedidos');
			$pedidosSolicitadosProfissional = new PedidosController;
			$pedidosSolicitadosProfissional->constructClasses();
			return $pedidosSolicitadosProfissional->pedidosSolicitadosProfissional($profissional_id);	
		}
		
		public function profissionalSolicitarFinalizarPedido($profissional_id) 
		{
			App::import('Controller', 'Pedidos');
			$solicitarFinalizarPedidoProfissional = new PedidosController;
			$solicitarFinalizarPedidoProfissional->constructClasses();
			return $solicitarFinalizarPedidoProfissional->solicitarFinalizarPedidoProfissional($profissional_id);	
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
		
		public function mensagensPedido($pedido_id) 
		{
			App::import('Controller', 'Pedidos');
			$mensagensPedido = new PedidosController;
			$mensagensPedido->constructClasses();
			return $mensagensPedido->mensagensPedido($pedido_id);	
		}
		
		/*public function enderecoAnuncio($anuncio_id) 
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
		}*/
		
		public function email($username) 
		{
			App::import('Controller', 'Clientes');
			$cliente = new ClientesController;
			$cliente->constructClasses();
			return $cliente->email($username);	
		}
				
		public function bairros($cidade) 
		{
			App::import('Controller', 'Bairros');
			$bairros = new BairrosController;
			$bairros->constructClasses();
			return $bairros->bairros($cidade);	
		}
		
		public function estados() 
		{
			App::import('Controller', 'Cidades');
			$cidades = new CidadesController;
			$cidades->constructClasses();
			return $cidades->estados();	
		}
		
		public function beforeFilter() 
		{
			$this->Auth->allow('clienteHome', 'profissionalHome', 'display');
		}
	}
?>