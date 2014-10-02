<?php
	class ProfissionalsController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		public function index()
		{
			$this->set('profissionals', $this->Profissional->find('all'));
		}
	
		public function view($id_profissional = null) 
		{
			if (!$id_profissional) {
				throw new NotFoundException(__('Usuário inválido'));
			}
	
			$profissional = $this->Profissional->findById($id_profissional);
			if (!$profissional) {
				throw new NotFoundException(__('Usuário não encontrado'));
			}
			$this->set('profissional', $profissional);
		}
	
		public function cadastro()
		{
			$this->layout = 'home';
			if ($this->request->is('post'))
			{
				$this->Profissional->create();
				if ($this->Profissional->saveAssociated($this->request->data))
				{
					$this->Session->setFlash(__('Profissional salvo com sucesso.'), "flash_notification");
					return $this->redirect( array (
							'controller' => 'profissionals',
							'action' => 'perfil' 
					) );
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function editar($id = null) 
		{
			$this->layout = 'home';
			
			if (!$id) {
				throw new NotFoundException(__('Profissional inválido'));
			}
		  
			$profissional = $this->Profissional->findById($id);
			if (!$profissional) {
				throw new NotFoundException(__('Profissional não encontrado'));
			}
			if ($this->request->is(array('post', 'put'))) {
				$this->Profissional->id = $id;
				if ($this->Profissional->save($this->request->data)) {

					$this->Session->setFlash(__('Profissional salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'perfil'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $profissional;
			}
		}
	
		public function delete($id_profissional) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Profissional->delete($id_profissional)) {
				$this->Session->setFlash(
				__('Usu�rio excluido com sucesso.', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		public function perfil()
		{
			$this->layout = 'home';
		}
		
		public function dadosProfissional($id)
		{
			$sql=$this->Profissional->query("SELECT tb_pessoa.* FROM tb_pessoa WHERE tb_pessoa.id ='".$id."';");
			return $sql;
		}
	}
?>