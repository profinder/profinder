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
		
		public function beforeFilter() {
			$this->Auth->allow('comentariosAvaliacao', 'salvar_mensagem', 'caminho_foto', 'visualizar', 'display', 'add', 'anuncios', 'cliente_home', 'clientePedidos', 'clientePedidosFinalizados', 'clientePedidosAvaliar', 'profissional_home', 'profissionalPedidosSolicitados', 'profissionalSolicitacaoFinalizarPedido', 'clienteSolicitacaoFinalizarPedido', 'edit', 'perfil', 'editar', 'cadastro', 'profissionalAnuncios', 'clienteMensagensPedido', 'profissionalMensagensPedido', 'clienteFinalizarPedido', 'profissionalFinalizarPedido', 'avaliarPedido');
		}
	}
?>
