<?php
	class AnunciosController extends AppController
	{
		public $helpers = array('Html', 'Form');
		
		var $paginate = array(
				'fields' => array('Anuncio.id'),
				'limit' => 2,
				'order' => array(
						'Anuncio.id' => 'desc'
				)
		);
	
		public function index()
		{
			$data = $this->paginate('Anuncio');
    		$this->set('data', $data);
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
	
		public function cadastro()
		{
			$this->layout = 'home2';
			if ($this->request->is('post'))
			{
				$this->Anuncio->create();
				$this->request->data['Anuncio']['servico_id']=$this->request->data['servico'];
				var_dump($this->request->data);
				if ($this->request->data['Anuncio']['modo_atendimento']=='escritorio')
				{
					if ($this->Anuncio->saveAssociated($this->request->data, array("deep" => true)))
					{
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
						$idAnuncio = $this->Anuncio->id;
						$this->Session->write('codigoAnuncio', $idAnuncio);
						return $this->redirect(array('controller'=> 'fotos', 'action' => 'cadastro'));					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				else if ($this->request->data['Anuncio']['modo_atendimento']=='online')
				{
					if ($this->Anuncio->save($this->request->data, array("deep" => true)))
					{
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
						$idAnuncio = $this->Anuncio->id;
						$this->Session->write('idAnuncio', $idAnuncio);
						return $this->redirect(array('controller'=> 'fotos', 'action' => 'cadastro'));
					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				else if ($this->request->data['Anuncio']['modo_atendimento']=='domiciliar')
				{
					if ($this->Anuncio->save($this->request->data, array("deep" => true)))
					{
						$cidade=$this->request->data['cidadesSelect'];
						$this->Session->write('cidade', $cidade);
						$idAnuncio = $this->Anuncio->id;
						var_dump($idAnuncio);
						$this->Session->write('idAnuncio', $idAnuncio);
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
						if($this->Session->read('anuncio')=='salvar')
						{
							return $this->redirect(array('controller'=> 'pages', 'action' => 'mostrar_bairro'));
						}
						else{
							return $this->redirect(array('controller'=> 'pages', 'action' => 'mostrar_bairro_editar'));
						}
						
					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
			}
		}
	
		public function editar($id = null)
		{
			$this->layout = 'home2';
			if (!$id) {
				throw new NotFoundException(__('Anúncio inválido'));
			}
		  
			$anuncio = $this->Anuncio->findById($id);
			$this->set('anuncio', $this->Anuncio->findById($id));
			if (!$anuncio) {
				throw new NotFoundException(__('Bairro não encontrado'));
			}
			
			if ($this->request->is(array('post', 'put'))) 
			{
				if ($this->request->data['Anuncio']['modo_atendimento']=='escritorio')
					{
						if ($this->Anuncio->saveAssociated($this->request->data, array("deep" => true)))
						{
							$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
							$idAnuncio = $this->Anuncio->id;
							$this->Session->write('idAnuncio', $idAnuncio);
							$endereco = $this->Endereco->findById ( $id );
							return $this->redirect(array('controller'=> 'fotos', 'action' => 'cadastro'));					}
						$this->Session->setFlash(__('Erro ao salvar dados!'));
					}
					else if ($this->request->data['Anuncio']['modo_atendimento']=='online')
					{
						if ($this->Anuncio->save($this->request->data, array("deep" => true)))
						{
							$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
							$idAnuncio = $this->Anuncio->id;
							$this->Session->write('idAnuncio', $idAnuncio);
							return $this->redirect(array('controller'=> 'fotos', 'action' => 'cadastro'));
						}
						$this->Session->setFlash(__('Erro ao salvar dados!'));
					}
					else if ($this->request->data['Anuncio']['modo_atendimento']=='domiciliar')
					{
						if ($this->Anuncio->save($this->request->data, array("deep" => true)))
						{
							$cidade=$this->request->data['cidadesSelect'];
							$this->Session->write('cidade', $cidade);
							$idAnuncio = $this->Anuncio->id;
							var_dump($idAnuncio);
							$this->Session->write('idAnuncio', $idAnuncio);
							$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
							return $this->redirect(array('controller'=> 'pages', 'action' => 'mostrar_bairro_editar'));
						}
						$this->Session->setFlash(__('Erro ao salvar dados!'));
					}
					$this->Session->setFlash(__('Erro ao salvar dados.'));
				}
		  
			if (!$this->request->data) {
				$this->request->data = $anuncio;
			}
		}
	
		public function remover($id) 
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
	
		public function tipoAnuncio($tipoAnuncio) 
		{
			$this->Session->write('anuncio', $tipoAnuncio);
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
		
		public function cadastro2()
	{
			$this->layout = 'home';
			
			if ($this->request->is('post'))
			{
				
				$this->Anuncio->create();
				$this->request->data['Anuncio']['servico_id']=$this->request->data['servico'];
				var_dump($this->request->data);
				if ($this->request->data['Anuncio']['modo_atendimento']=='escritorio')
				{
					if ($this->Anuncio->saveAssociated($this->request->data, array("deep" => true)))
					{
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
						$idAnuncio = $this->Anuncio->id;
						$this->Session->write('codigoAnuncio', $idAnuncio);
						return $this->redirect(array('controller'=> 'fotos', 'action' => 'cadastro'));					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				else if ($this->request->data['Anuncio']['modo_atendimento']=='online')
				{
					
					if ($this->Anuncio->save($this->request->data, array("deep" => true)))
					{
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
						$idAnuncio = $this->Anuncio->id;
						$this->Session->write('idAnuncio', $idAnuncio);
						return $this->redirect(array('controller'=> 'fotos', 'action' => 'cadastro'));
					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				else if ($this->request->data['Anuncio']['modo_atendimento']=='domiciliar')
				{
					if ($this->Anuncio->save($this->request->data, array("deep" => true)))
					{
						$cidade=$this->request->data['cidadesSelect'];
						$this->Session->write('cidade', $cidade);
						$idAnuncio = $this->Anuncio->id;
						var_dump($idAnuncio);
						$this->Session->write('idAnuncio', $idAnuncio);
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
						if($this->Session->read('anuncio')=='salvar')
						{
							return $this->redirect(array('controller'=> 'pages', 'action' => 'mostrar_bairro'));
						}
						else{
							return $this->redirect(array('controller'=> 'pages', 'action' => 'mostrar_bairro_editar'));
						}
						
					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
			}
		}
		public function anuncios()
		{
			$this->layout = 'home';
			$id_servico = $_GET["serv"];
			$sql = $this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio WHERE tb_anuncio.status_anuncio = 'ativo' AND tb_anuncio.servico_id =".$id_servico." AND tb_anuncio.id NOT IN (SELECT DISTINCT tb_anuncio.id FROM tb_anuncio INNER JOIN tb_pedido ON tb_pedido.anuncio_id = tb_anuncio.id INNER JOIN tb_avaliacao ON tb_avaliacao.pedido_id = tb_pedido.id)");
			
			return $sql;
		}
		
		public function anuncioBairro()
		{
			$this->layout='home';
		}
		
		public function anunciosBairro($bairro)
		{
			$id_servico = $_GET["serv"];
			$sql = $this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio inner join tb_bairro_anuncio on tb_anuncio.id=tb_bairro_anuncio.anuncio_id inner join tb_bairro on tb_bairro_anuncio.bairro_id=tb_bairro.id where tb_anuncio.servico_id=".$id_servico." and tb_bairro.nome_bairro='".$bairro."';");
			return $sql;
		}
		
		public function profissionalAnuncios($profissional_id = null)
		{
			$this->layout = 'home';
			$sql=$this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio WHERE tb_anuncio.profissional_id='".$profissional_id."';");
			return $sql;
		}
		
		public function enderecoAnuncio($anuncio_id)
		{
			$sql=$this->Anuncio->query("SELECT tb_endereco.* FROM tb_endereco INNER JOIN tb_anuncio WHERE tb_anuncio.endereco_id = tb_endereco.id AND tb_anuncio.id ='".$anuncio_id."';");
			return $sql;
		}
		
		public function anunciosServico($servico_id)
		{
			$sql= $this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio INNER JOIN tb_servico ON tb_anuncio.servico_id = tb_servico.id WHERE tb_servico.nome_servico = '".$servico_id."';");
			return $sql;
		}
		
		public function dadosProfissionalAnuncio($anuncio_id) 
		{
			App::import('Controller', 'Profissionals');
			$profissional = new ProfissionalsController;
			$profissional->constructClasses();
			return $profissional->dadosProfissionalAnuncio($anuncio_id);	
		}
		
		public function bairrosAnuncio($anuncio_id)
		{
			$sql=$this->Anuncio->query("SELECT tb_bairro.* FROM tb_bairro INNER JOIN tb_bairro_anuncio ON tb_bairro.id = tb_bairro_anuncio.bairro_id INNER JOIN tb_anuncio ON tb_anuncio.id = tb_bairro_anuncio.anuncio_id WHERE tb_anuncio.id ='".$anuncio_id."';");
			return $sql;
		}
		
		public function upload($imagem = array(), $dir = 'img')
		{
			$dir = WWW_ROOT.$dir.DS;
			
			if(($imagem['error']!=0) and ($imagem['size']==0)) {
				throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
			}
		
			$this->checa_dir($dir);
		
			$imagem = $this->checa_nome($imagem, $dir);
		
			$this->move_arquivos($imagem, $dir);
		
			return $imagem['name'];
		
		}
		public function checa_dir($dir)
		{
			App::uses('Folder', 'Utility');
			$folder = new Folder();
			if (!is_dir($dir)){
				$folder->create($dir);
			}
		}
		
		/**
		 * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
		 * @access public
		 * @param Array $imagem
		 * @param String $data
		 * @return nome da imagem
		 */
		public function checa_nome($imagem, $dir)
		{
			$imagem_info = pathinfo($dir.$imagem['name']);
			$imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
			debug($imagem_nome);
			$conta = 2;
			while (file_exists($dir.$imagem_nome)) {
				$imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
				$imagem_nome .= '.'.$imagem_info['extension'];
				$conta++;
				debug($imagem_nome);
			}
			$imagem['name'] = $imagem_nome;
			return $imagem;
		}
		
		/**
		 * Trata o nome removendo espaços, acentos e caracteres em maiúsculo.
		 * @access public
		 * @param Array $imagem
		 * @param String $data
		 */
		public function trata_nome($imagem_nome)
		{
			$imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
			return $imagem_nome;
		}
		
		/**
		 * Move o arquivo para a pasta de destino.
		 * @access public
		 * @param Array $imagem
		 * @param String $data
		 */
		public function move_arquivos($imagem, $dir)
		{
			App::uses('File', 'Utility');
			$arquivo = new File($imagem['tmp_name']);
			$arquivo->copy($dir.$imagem['name']);
			$arquivo->close();
		}
		
		public function detalhesAnuncio()
		{
			$this->layout='home';
		}
		
		public function caminho_foto($id)
		{
			$sql= $this->Anuncio->query("SELECT tb_foto.* FROM tb_anuncio INNER JOIN tb_foto ON tb_anuncio.id = tb_foto.anuncio_id WHERE tb_anuncio.id='".$id."';");
			return $sql;
		}
		
		public function dadosAnuncios($id_anuncio=null)
		{
			$sql = $this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio WHERE tb_anuncio.id='".$id_anuncio."';");
			return $sql;
		}
		
		public function servicoAnuncios($id_servico)
		{
			$sql = $this->Anuncio->query("SELECT tb_servico.nome_servico FROM tb_servico WHERE tb_servico.id='".$id_servico."';");
			return $sql;
		}
		
		public function pedidosAnuncio($id_anuncio)
		{
			$sql = $this->Anuncio->query("SELECT tb_pedido.* FROM tb_pedido WHERE tb_pedido.anuncio_id ='".$id_anuncio."';");
			return $sql;
		}
		
		public function setStatusAnuncio($id_anuncio)
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$sql = $this->Anuncio->query("UPDATE tb_anuncio SET tb_anuncio.status_anuncio = 'inativo' WHERE tb_anuncio.id ='".$id_anuncio."';");
			$this->redirect(array('action' => 'profissionalAnuncios'));
			return $sql;
		}
		
		public function anunciosOrdemAvaliacao($id_servico)
		{
			$sql = $this->Anuncio->query("SELECT tb_anuncio.*, AVG(tb_avaliacao.nota_avaliacao) FROM tb_avaliacao 
					INNER JOIN tb_pedido ON tb_pedido.id = tb_avaliacao.pedido_id 
					INNER JOIN tb_anuncio ON tb_anuncio.id = tb_pedido.anuncio_id
					WHERE tb_anuncio.servico_id ='".$id_servico."'
					GROUP BY tb_anuncio.id
					ORDER BY AVG(tb_avaliacao.nota_avaliacao) DESC;");
			return $sql;
		}
	}
?>