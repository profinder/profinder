<?php
	class SugestaosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('sugestaos', $this->Sugestao->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Sugestao inválida'));
			}
	
			$sugestao = $this->Sugestao->findById($id);
			if (!$sugestao) {
				throw new NotFoundException(__('Sugestao não encontrada'));
			}
			$this->set('sugestao', $sugestao);
		}
	
		public function cadastro()
		{
			$this->layout = 'home';
			if ($this->request->is('post'))
			{
				$this->Sugestao->create();
				if ($this->Sugestao->save($this->request->data))
				{
					$this->Session->setFlash(__('Sugestao salva com sucesso.'), "flash_notification");
					return $this->redirect(array('controller' => 'pages','action' => 'profissionalHome'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Sugestao inválida'));
			}
		  
			$sugestao = $this->Sugestao->findById($id);
			if (!$sugestao) {
				throw new NotFoundException(__('Sugestao não encontrada'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Sugestao->id = $id;
				if ($this->Sugestao->save($this->request->data)) {
					$this->Session->setFlash(__('Sugestao salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $sugestao;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Sugestao->delete($id)) {
				$this->Session->setFlash(
				__('Sugestao excluida com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function sugestoes()
		{
			$sql=$this->Sugestao->query("SELECT tb_sugestao.* FROM tb_sugestao;");
			return $sql;
		}
		
		public function dadosProfissionalSugestao($sugestao_id)
		{
			$sql=$this->Sugestao->query("SELECT tb_pessoa.* FROM tb_pessoa INNER JOIN tb_profissional ON tb_pessoa.id = tb_profissional.id INNER JOIN tb_sugestao ON tb_sugestao.profissional_id = tb_profissional.id WHERE tb_sugestao.id = '".$sugestao_id."';");
			return $sql;
		}
	}
?>