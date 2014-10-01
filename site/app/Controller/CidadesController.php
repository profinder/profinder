<?php
	class CidadesController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('cidades', $this->Cidade->find('all'));
		}
		
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Cidade inválida'));
			}
	
			$cidade = $this->Cidade->findById($id);
			if (!$cidade) {
				throw new NotFoundException(__('Cidade não encontrada'));
			}
			$this->set('cidade', $cidade);
		}
	
		public function estados(){
			$sql= $this->Cidade->query("select DISTINCT tb_cidade.estado_cidade from tb_cidade;");
			return $sql;
		}
		
		public function cidades($estado){
			$sql= $this->Cidade->query("select tb_cidade.nome_cidade from tb_cidade where tb_cidade.estado_cidade='".$estado."' ORDER BY tb_cidade.nome_cidade;");
			return $sql;
		}
		
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Cidade->create();
				if ($this->Cidade->save($this->request->data))
				{
					$this->Session->setFlash(__('Cidade salva com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Cidade inválida'));
			}
		  
			$cidade = $this->Cidade->findById($id);
			if (!$cidade) {
				throw new NotFoundException(__('Cidade não encontrada'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Cidade->id = $id;
				if ($this->Cidade->save($this->request->data)) {
					$this->Session->setFlash(__('Cidade salva com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $cidade;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Cidade->delete($id)) {
				$this->Session->setFlash(
				__('Cidade excluida com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}
?>