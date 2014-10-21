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


			$this->layout = 'home';
			if ($this->request->is('post'))
			{
				$this->Foto->create();

				//var_dump($foto);
				
				$foto['Foto']['caminho_foto']='/profinder/site/app/webroot/img/'.$this->request->data['Foto']['legenda_foto']['name'];

				var_dump($this->request->data);
				$foto['Foto']['caminho_foto']='/profinder/site/img/'.$this->request->data['Foto']['legenda_foto']['name'];

				
				$foto['Foto']['legenda_foto']=$this->request->data['Foto']['caminho_foto'];
				$foto['Foto']['anuncio_id']=$this->Session->read('idAnuncio');
				var_dump($foto['Foto']['anuncio_id']);
				
				if ($this->Foto->save($foto))
				{

					$this->upload($this->request->data['Foto']['legenda_foto']);
					$this->Session->setFlash(__('Foto salva com sucesso!'), "flash_notification");
		
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

		public function upload($imagem = array(), $dir = 'img')  
		{  
			$dir = WWW_ROOT.$dir.DS;  
			var_dump($imagem);
			if(($imagem['error']!=0) and ($imagem['size']==0)) {  
				throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);  
			}  
			 App::uses('File', 'Utility');  
			$arquivo = new File($imagem['tmp_name']);  
			$arquivo->copy($dir.$imagem['name']);  
			$arquivo->close(); 
			
			return $imagem['name'];  
		}  

		public function upload_foto($file=null) {
			var_dump($file);
			if ($file['Foto']['legenda_foto']['error'] === UPLOAD_ERR_OK) {
				$id = String::uuid();
				
				move_uploaded_file($file['Foto']['legenda_foto']['name'], "C:\wamp\www\profinder\site\app\webroot\img".$id);
					

					return true;

			}
			return false;
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
	
