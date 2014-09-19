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
		  
			if ($this->Bairro->delete($id)) {
				$this->Session->setFlash(
				__('Bairro excluido com sucesso.', "flash_notification")
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
		
		public function anuncios($id_profissional)
		{
			$conditions = array("Anuncio.profissional_id" => $id_profissional);
			return $this->Anuncio->find('all', array( 'conditions'=>$conditions));
		}
	}
?>