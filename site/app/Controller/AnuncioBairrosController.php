<?php
	class AnuncioBairrosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('anunciobairros', $this->AnuncioBairro->find('all'));
		}
	
		public function add()
		{
			$this->layout = 'clean';
			if ($this->request->is('post'))
			{
				$this->AnuncioBairro->create();
				if ($this->AnuncioBairro->save($this->request->data))
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
				throw new NotFoundException(__('Anuncio inválido'));
			}
		  
			$anuncioBairro = $this->AnuncioBairro->findById($id);
			if (!$anuncioBairro) {
				throw new NotFoundException(__('Bairro não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->AnuncioBairro->id = $id;
				if ($this->AnuncioBairro->save($this->request->data)) {
					$this->Session->setFlash(__('Bairro salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $anuncioBairro;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->AnuncioBairro->delete($id)) {
				$this->Session->setFlash(
				__('Bairro excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function salvar($idAnuncio, $idBairro)
		{
			$sql= $this->AnuncioBairro->query("insert into tb_bairro_anuncio (anuncio_id, bairro_id) values ('".$idAnuncio."', '".$idBairro."');");
			return $sql;
		}
		
		public function pesquisarBairro($idAnuncio)
		{
			$sql= $this->AnuncioBairro->query("select tb_bairro_anuncio.bairro_id from tb_bairro_anuncio where tb_bairro_anuncio.anuncio_id=".$idAnuncio.";");
			return $sql;
		}
		
		public function deletarBairro($idAnuncio)
		{
			$sql= $this->AnuncioBairro->query("delete from tb_bairro_anuncio where tb_bairro_anuncio.anuncio_id=".$idAnuncio.";");
			return $sql;
		}
	}
?>