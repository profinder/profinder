<?php
	class ServicosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('servicos', $this->Servico->find('all'));
		}
	
		public function view($id = null) 
		{
			if (!$id) {
				throw new NotFoundException(__('Servico inválido'));
			}
	
			$servico = $this->Servico->findById($id);
			if (!$servico) {
				throw new NotFoundException(__('Servico não encontrado'));
			}
			$this->set('servico', $servico);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Servico->create();
				if ($this->Servico->save($this->request->data))
				{
					$this->Session->setFlash(__('Servico salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Servico inválido'));
			}
		  
			$servico = $this->Servico->findById($id);
			if (!$servico) {
				throw new NotFoundException(__('Servico não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Servico->id = $id;
				if ($this->Servico->save($this->request->data)) {
					$this->Session->setFlash(__('Servico salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $servico;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Servico->delete($id)) {
				$this->Session->setFlash(
				__('Servico excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
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
			$conditions = array("Servico.categoria_id" => $id_categoria);
			return $this->Servico->find('all', array( 'conditions'=>$conditions));
		}	
		
		public function idServico($nome_servico)
		{
			$sql=$this->Servico->query("SELECT tb_servico.* FROM tb_servico WHERE tb_servico.nome_servico = '".$nome_servico."';");
			return $sql;
		}
		
		public function nomeServico() 
		{
			return $this->Servico->find('all');
		}
		
		public function getCategorias()
		{
			$sql=$this->Servico->query("SELECT tb_categoria.* FROM tb_categoria ORDER BY tb_categoria.nome_categoria;");
			return $sql;
		}
		
		public function servicos($categoria_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Servico->query("SELECT tb_servico.* FROM tb_servico WHERE tb_servico.categoria_id = '".$categoria_id."' ORDER BY tb_servico.nome_servico;");
			return $sql;
		}
		
		public function categoriaServico($categoria_id)
		{
			$this->layout = 'home';
			$sql=$this->Servico->query("SELECT tb_categoria.* FROM tb_categoria WHERE tb_categoria.id = '".$categoria_id."';");
			return $sql;
		}
		
		public function servicosCategoria($categoria)
		{
			$sql=$this->Servico->query("SELECT tb_servico.* FROM tb_servico WHERE tb_servico.categoria_id = ".$categoria.";");
			return $sql;
		}
	}
?>