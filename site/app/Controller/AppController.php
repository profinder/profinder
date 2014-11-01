<?php
	App::uses('Controller', 'Controller');
	
	class AppController extends Controller {
	
		public $components = array
		(
			'Session',
			'Auth' => array(
				'loginRedirect' => array(
					'controller' => 'dashboard',
					'action' => 'index'
					
				),
				'logoutRedirect' => array(
					'controller' => 'pages',
					'action' => 'display',
					'home'
				),
				'authorize' => array('Controller')
			)
		);
		
		public function isAuthorized($user)
		{
			if (isset($user['role']) && $user['role'] === 'admin') {
				return true;
			}
			return false;
		}
		
		/*
		public function beforeFilter() {

			if( AuthComponent::user('id') == null )
			{
				App::import('Vendor', 'facebook-php-sdk-master/src/facebook');
				$this->Facebook = new Facebook(array(
						'appId'     =>  '1496505570602503',
						'secret'    =>  '8d44047def9b253341cd80eb4deeae8d'

		
				));
					
				$this->set('fb_login_url', $this->Facebook->getLoginUrl(array('scope'=>'email', 'redirect_uri' => Router::url(array('controller' => 'users', 'action' => 'login'),true))));
				$this->set('user', $this->Auth->user());
					
			}
			
			//$this->Auth->allow('index', 'view');

			$this->Auth->allow(
				'add', 'ajax_buscar_cidades.php', 'anuncioBairro', 'anuncios', 'avaliarPedido', 
				'cadastro', 'caminho_foto', 'categorias', 'cliente_home', 'clientePedidos', 'clientePedidosFinalizados', 'clientePedidosAvaliar', 'clienteSolicitacaoFinalizarPedido', 'clienteMensagensPedido', 'clienteFinalizarPedido', 'comentariosAvaliacao', 
				'dadosProfissional', 'dadosProfissionalSugestao', 'detalhesAnuncio', 'display', 'delete',
				'edit', 'editar', 'enviar_email', 'email',
				'facebook',
				'google_map',
				'upload_foto',
				'perfil', 'profissional_home', 'profissionalPedidosSolicitados', 'profissionalSolicitacaoFinalizarPedido', 'profissionalAnuncios', 'profissionalMensagensPedido', 'profissionalFinalizarPedido',
				'redirecionar_mensagem', 'remover',
				'salvar_mensagem', 'servicos'
			); 
		}
		*/
		public function beforeFilter() {

			$this->Auth->allow(
				'add', 'ajax_buscar_cidades.php', 'anuncioBairro', 'anuncios', 'avaliarPedido', 
				'cadastro', 'caminho_foto', 'categorias', 'cliente_home', 'clientePedidos', 'clientePedidosFinalizados', 'clientePedidosAvaliar', 'clienteSolicitacaoFinalizarPedido', 'clienteMensagensPedido', 'clienteFinalizarPedido', 'comentariosAvaliacao', 
				'dadosProfissional', 'dadosProfissionalSugestao', 'detalhesAnuncio', 'display', 'delete',
				'edit', 'editar', 'enviar_email', 'email',
				'facebook',
				'google_map',
				'upload_foto',
				'perfil', 'profissional_home', 'profissionalPedidosSolicitados', 'profissionalSolicitacaoFinalizarPedido', 'profissionalAnunciosAtivos', 'profissionalAnunciosInativos', 'profissionalMensagensPedido', 'profissionalFinalizarPedido',
				'redirecionar_mensagem', 'remover',
				'salvar_mensagem', 'servicos'
			); 
			//$this->Auth->allow('google_map', 'ajax_buscar_cidades.php', 'anuncioBairro', 'display', 'add', 'anuncios', 'cliente_home', 'clientePedidos', 'clientePedidosFinalizados', 'clientePedidosAvaliar', 'profissional_home', 'profissionalPedidosSolicitados', 'delete', 'profissionalSolicitacaoFinalizarPedido', 'clienteSolicitacaoFinalizarPedido', 'edit', 'perfil', 'editar', 'cadastro', 'profissionalAnuncios', 'clienteMensagensPedido', 'profissionalMensagensPedido', 'clienteFinalizarPedido', 'enviar_email', 'profissionalFinalizarPedido', 'avaliarPedido', 'email');
		}
	}
?>
