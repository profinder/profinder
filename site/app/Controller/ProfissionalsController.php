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
			$this->layout = 'home2';
			if ($this->request->is('post'))
			{
				$this->Profissional->create();
				$contador=3;
				$numero_telefone=$this->request->data['Telefone'][0]['numero_telefone'];
				$this->request->data['Telefone'][0]['ddd_telefone']=substr($numero_telefone,1,2);
				$this->request->data['Telefone'][0]['numero_telefone']=substr($numero_telefone,4,5).substr($numero_telefone,10,13);
				var_dump($this->request->data['Telefone'][0]['numero_telefone']);
				if ($this->request->data['Telefone'][1]['numero_telefone']=='')
				{
					unset($this->request->data['Telefone'][1]);
					$contador=1;
				}
				else{
					$numero_telefone=$this->request->data['Telefone'][1]['numero_telefone'];
					$this->request->data['Telefone'][1]['ddd_telefone']=substr($numero_telefone,1,2);
					$this->request->data['Telefone'][1]['numero_telefone']=substr($numero_telefone,4,5).substr($numero_telefone,10,13);
				}
				
				if ($this->request->data['Telefone'][2]['numero_telefone']=='')
				{
					unset($this->request->data['Telefone'][2]);
					$contador=2;
				}	
				else{
					$numero_telefone=$this->request->data['Telefone'][2]['numero_telefone'];
					$this->request->data['Telefone'][2]['ddd_telefone']=substr($numero_telefone,1,2);
					$this->request->data['Telefone'][2]['numero_telefone']=substr($numero_telefone,4,5).substr($numero_telefone,10,13);
				}
				
				if ($this->Profissional->save($this->request->data))
				{
					$this->Session->setFlash(__('Profissional salvo com sucesso.'), "flash_notification");
					$idProfissional = $this->Profissional->id;
					$contadorWhile=0;
					$this->deletarTelefone($idProfissional);
					while($contadorWhile<sizeof($this->request->data['Telefone'])){
						$ddd=$this->request->data['Telefone'][$contadorWhile]['ddd_telefone'];
						$tipo=$this->request->data['Telefone'][$contadorWhile]['tipo_telefone'];
						$numero=$this->request->data['Telefone'][$contadorWhile]['numero_telefone'];
						$id=$idProfissional;
						$editar=$this->buscarTelefone($id);
						var_dump($editar);
						$this->salvarTelefone($ddd, $tipo, $numero, $id);
						
						
						$contadorWhile++;
					}
					
					return $this->redirect( array (
							'controller' => 'pages',
							'action' => 'index' 
					) );
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
		}
	
		public function editar($id = null) 
		{
			$this->layout = 'home2';
			
			if (!$id) {
				throw new NotFoundException(__('Profissional inválido'));
			}
			$this->Session->write('idProfissional', $id);
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
		
		public function dadosProfissional($id = null)
		{
			$this->layout = 'home';
			$sql=$this->Profissional->query("SELECT tb_pessoa.* FROM tb_pessoa WHERE tb_pessoa.id ='".$id."';");
			return $sql;
		}
		
		public function dadosProfissionalAnuncio($anuncio_id)
		{
			$sql=$this->Profissional->query("SELECT tb_pessoa.* FROM tb_pessoa INNER JOIN tb_profissional ON tb_pessoa.id = tb_profissional.id INNER JOIN tb_anuncio ON tb_anuncio.profissional_id = tb_profissional.id WHERE tb_anuncio.id ='".$anuncio_id."';");
			return $sql;
		}
	
		public function salvarTelefone($ddd, $tipo, $numero, $id)
		{
			$sql=$this->Profissional->query("insert into tb_telefone (ddd_telefone, tipo_telefone, numero_telefone, pessoa_id) values (".$ddd.", '".$tipo."', ".$numero.",".$id.");");
			return $sql;
		}
		
		public function buscarTelefone($id)
		{
			$sql=$this->Profissional->query("select * from tb_telefone where tb_telefone.pessoa_id=".$id.";");
			return $sql;
		}
		
		public function deletarTelefone($id)
		{
			$sql=$this->Profissional->query("delete from tb_telefone where pessoa_id=".$id.";");
			return $sql;
		}
		
		public function tipoProfissional($tipoProfissional) 
		{
			$this->Session->write('tipoProfissional', $tipoProfissional);
		}
	}
?>