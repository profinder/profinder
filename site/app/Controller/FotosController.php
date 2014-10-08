<?php
	class FotosController extends AppController
	{
		public $helpers = array('Html', 'Form');
	
		/*public function index()
		{
			$this->set('fotos', $this->Servico->find('all'));
		}*/
	
		public function view($id = null) 
		{
			if (!$id) {
				throw new NotFoundException(__('Foto inválida'));
			}
	
			$foto = $this->Foto->findById($id);
			if (!$foto) {
				throw new NotFoundException(__('Foto não encontrada'));
			}
			$this->set('foto', $foto);
		}
	
		public function cadastro()
		{
			var_dump("1");
			$this->layout = 'home';
			if ($this->request->is('post'))
			{
				
				$this->Foto->create();
				var_dump($this->request->data);
				if ($this->Foto->save($this->request->data))
				{
					$this->Session->setFlash(__('Foto salva com sucesso!'), "flash_notification");
					return $this->redirect(array('controller' => 'profissionals', 'action' => 'index'));
					$this->upload_foto();
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}			

			
		}
			
		public function edit($id = null)
		{
			if (!$id) {
				throw new NotFoundException(__('Foto inválido'));
			}
		  
			$foto = $this->Foto->findById($id);
			if (!$foto) {
				throw new NotFoundException(__('Foto não encontrado'));
			}
			$this->layout = 'clean';
			if ($this->request->is(array('post', 'put'))) {
				$this->Foto->id = $id;
				if ($this->Foto->save($this->request->data)) {
					$this->Session->setFlash(__('Foto salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $foto;
			}
		}
	
		public function delete($id) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
		  
			if ($this->Foto->delete($id)) {
				$this->Session->setFlash(
				__('Foto excluída com sucesso!', "flash_notification")
				);
				return $this->redirect(array('action' => 'index'));
			}
		}
		function upload_foto() {
			$file = $this->data['Foto']['file'];
			if ($file['error'] === UPLOAD_ERR_OK) {
				$id = String::uuid();
				if (move_uploaded_file($file['tmp_name'], APP.'uploads'.DS.$id)) {
					$this->data['Foto']['id'] = $id;
					$this->data['Foto']['user_id'] = $this->Auth->user('id');
					$this->data['Foto']['filename'] = $file['name'];
					$this->data['Foto']['filesize'] = $file['size'];
					$this->data['Foto']['filemime'] = $file['type'];
					return true;
				}
			}
			return false;
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
	}
