<?php
	class AnunciosController extends AppController
	{
		
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('anuncios', $this->Anuncio->find('all'));
		}
	
		public function view($id = null) 
		{
			$this->layout = 'clean';
			if (!$id) {
				throw new NotFoundException(__('Bairro inválido'));
			}
	
			$anuncio = $this->Anuncio->findById($id);
			if (!$anuncio) {
				throw new NotFoundException(__('Bairro não encontrado'));
			}
			$this->set('anuncio', $anuncio);
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->Anuncio->create();
				if ($this->Anuncio->save($this->request->data))
				{
					$this->Session->setFlash(__('Anuncio salvo com sucesso.'), "flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Bairro inválido'));
			}
		  
			$anuncio = $this->Anuncio->findById($id);
			if (!$anuncio) {
				throw new NotFoundException(__('Bairro não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Anuncio->id = $id;
				if ($this->Anuncio->save($this->request->data)) {
					$this->Session->setFlash(__('Anúncio salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $anuncio;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Anuncio->delete($id)) {
				$this->Session->setFlash(
				__('Anuncio excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function nomeServico() 
		{
			App::import('Controller', 'Servicos');
			$servicos = new ServicosController;
			$servicos->constructClasses();
			return $servicos->nomeServico();
		}
		
		public function nomeAnuncio($id_servico)
		{
			$conditions = array("Anuncio.id_servico" => $id_servico);
			return $this->Anuncio->find('all', array( 'conditions'=>$conditions));
		}
		
		public function anuncios($id_servico)
		{
			$sql = $this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio WHERE tb_anuncio.servico_id='".$id_servico."';");
			return $sql;
		}
		
		public function anunciosProfissional($profissional_id)
		{
			$sql=$this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio WHERE tb_anuncio.profissional_id='".$profissional_id."';");
			return $sql;
		}
		
		public function enderecoAnuncio($anuncio_id)
		{
			$sql=$this->Anuncio->query("SELECT tb_endereco.* FROM tb_endereco INNER JOIN tb_anuncio WHERE tb_anuncio.endereco_id = tb_endereco.id AND tb_anuncio.id ='".$anuncio_id."';");
			return $sql;
		}
		
		public function remover($anuncio_id)
		{
			$sql= $this->Anuncio->query("DELETE FROM tb_anuncio WHERE tb_anuncio.id = '".$anuncio_id."';");
			return $sql;
		}
		
		public function anunciosServico($servico_id)
		{
			$sql= $this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio INNER JOIN tb_servico ON tb_anuncio.servico_id = tb_servico.id WHERE tb_servico.nome_servico = '".$servico_id."';");
			return $sql;
		}
	}
?>