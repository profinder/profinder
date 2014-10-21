<?php
	class CategoriasController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('categorias', $this->Categoria->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Categoria inválida'));
			}
	
			$categoria = $this->Categoria->findById($id);
			if (!$categoria) {
				throw new NotFoundException(__('Categoria não encontrada'));
			}
			$this->set('categoria', $categoria);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Categoria->create();
				if ($this->Categoria->save($this->request->data))
				{
					$this->Session->setFlash(__('Categoria salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Categoria inválida'));
			}
		  
			$categoria = $this->Categoria->findById($id);
			if (!$categoria) {
				throw new NotFoundException(__('Categoria não encontrada'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Categoria->id = $id;
				if ($this->Categoria->save($this->request->data)) {
					$this->Session->setFlash(__('Categoria salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $categoria;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Categoria->delete($id)) {
				$this->Session->setFlash(
				__('Categoria excluida com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function nomeCategorias() 
		{
			return $this->Categoria->find('all');
		}
		
		public function categorias()
		{
			$this->layout = 'home';
			$sql=$this->Categoria->query('SELECT tb_categoria.* FROM tb_categoria ORDER BY tb_categoria.nome_categoria;');
			return $sql;
		}
	}
?>