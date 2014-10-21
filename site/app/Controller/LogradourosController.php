<?php
	class LogradourosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('logradouros', $this->Logradouro->find('all'));
		}
		
		public function view($id = null) 
		{
			$this->layout = 'default';
			if (!$id) {
				throw new NotFoundException(__('Logradouro inválida'));
			}
	
			$logradouro = $this->Logradouro->findById($id);
			if (!$logradouro) {
				throw new NotFoundException(__('Logradouro não encontrada'));
			}
			$this->set('logradouro', $logradouro);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Logradouro->create();
				if ($this->Logradouro->save($this->request->data))
				{
					$this->Session->setFlash(__('Logradouro salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Logradouro inválida'));
			}
		  
			$logradouro = $this->Logradouro->findById($id);
			if (!$logradouro) {
				throw new NotFoundException(__('Logradouro não encontrada'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Logradouro->id = $id;
				if ($this->Logradouro->save($this->request->data)) {
					$this->Session->setFlash(__('Logradouro salva com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $logradouro;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Logradouro->delete($id)) {
				$this->Session->setFlash(
				__('Logradouro excluida com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function estados()
		{
			$sql= $this->Logradouro->query("select DISTINCT tb_cidade.estado_cidade from tb_cidade;");
			return $sql;
		}
		
		public function cidades($estado){
			$sql= $this->Logradouro->query("select tb_cidade.nome_cidade from tb_cidade where tb_cidade.estado_cidade='".$estado."' ORDER BY tb_cidade.nome_cidade;");
			return $sql;
		}
		
	}
?>