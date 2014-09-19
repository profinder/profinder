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
			$this->layout = 'homeUsuario';
			var_dump('oi');
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
		
		public function anuncios($profissional_id) 
		{
			App::import('Controller', 'Anuncios');
			$anuncios = new AnunciosController;
			$anuncios->constructClasses();
			return $anuncios->anuncios($profissional_id);	
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
				
		public function beforeFilter() 
		{
			$this->Auth->allow('homeCliente', 'homeProfissional', 'display');
		}
	}
?>