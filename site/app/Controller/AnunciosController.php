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
	
		public function cadastro()
		{
			$this->layout = 'home';
			if ($this->request->is('post'))
			{
				$this->Anuncio->create();
				var_dump($this->request->data);
				if ($this->request->data['Anuncio']['modo_atendimento']=='escritorio')
				{
					if ($this->Anuncio->saveAssociated($this->request->data, array("deep" => true)))
					{
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
						return $this->redirect(array('controller'=> 'fotos', 'action' => 'cadastro'));					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				else if ($this->request->data['Anuncio']['modo_atendimento']=='online')
				{
					if ($this->Anuncio->save($this->request->data, array("deep" => true)))
					{
						$this->Session->setFlash(__('Anúncio salvo com sucesso!'), "flash_notification");
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
						return $this->redirect(array('controller'=> 'pages', 'action' => 'mostrar_bairro'));
					}
					$this->Session->setFlash(__('Erro ao salvar dados!'));
				}
				
			}
		}
	
		public function editar($id = null)
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
		
		public function anuncios()
		{
			$this->layout = 'home';
			$id_servico = $_GET["serv"];
			$sql = $this->Anuncio->query("SELECT tb_anuncio.* FROM tb_anuncio WHERE tb_anuncio.servico_id='".$id_servico."';");
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
	}
?>