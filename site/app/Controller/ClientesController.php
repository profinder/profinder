<?php
	App::uses('CakeEmail', 'Network/Email');

	class ClientesController extends AppController 
	{
		public $helpers = array(
			'Html',
			'Form');
		
		public function index() {
			$this->set ( 'clientes', $this->Cliente->find ( 'all' ) );
		}
		
		public function view($id_cliente = null) {
			if (! $id_cliente) {
				throw new NotFoundException ( __ ( 'Usuário inválido' ) );
			}
			
			$cliente = $this->Cliente->findById ( $id_cliente );
			if (! $cliente) {
				throw new NotFoundException ( __ ( 'Usuário não encontrado' ) );
			}
			$this->set ( 'cliente', $cliente );
		}
		
		public function cadastro()
		{
			$this->layout = 'home2';
			if ($this->request->is('post'))
			{
				$this->Cliente->create();
				
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
				
				var_dump($this->request->data);
				if ($this->Cliente->saveAssociated($this->request->data))
				{
					$this->Session->setFlash(__('Cliente salvo com sucesso!'), "flash_notification");
					
					$idProfissional = $this->Cliente->id;
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
						'controller' => 'clientes',
						'action' => 'perfil' 
					) );
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
				//$enderecos = $this->Endereco->Cliente->find('list');
	         	//$this->set(compact('clientes'));
		}
		
		public function cadastro2()
		{
			$this->layout = 'home2';
			if ($this->request->is('post'))
			{
				$this->Cliente->create();
				var_dump($this->request->data);
				if ($this->Cliente->saveAssociated($this->request->data))
				{
					$this->Session->setFlash(__('Cliente salvo com sucesso!'), "flash_notification");
					return $this->redirect( array (
						'controller' => 'clientes',
						'action' => 'perfil' 
					) );
				}
				$this->Session->setFlash(__('Erro ao salvar dados!'));
			}
				//$enderecos = $this->Endereco->Cliente->find('list');
	         	//$this->set(compact('clientes'));
		}
			
		public function editar($id = null) 
		{
			$this->layout = 'home2';
			if (!$id) {
				throw new NotFoundException(__('Cliente inválido'));
			}
			$this->Session->write('idCliente', $id);
			$cliente = $this->Cliente->findById($id);
			if (!$cliente) {
				throw new NotFoundException(__('Cliente não encontrado'));
			}
			if ($this->request->is(array('post', 'put'))) {
				$this->Cliente->id = $id;
				if ($this->Cliente->save($this->request->data)) {
					$this->Session->setFlash(__('Cliente salvo com sucesso'),
		    					"flash_notification");
					return $this->redirect(array('action' => 'perfil'));
				}
				$this->Session->setFlash(__('Erro ao salvar dados.'));
			}
		  
			if (!$this->request->data) {
				$this->request->data = $cliente;
			}
		}
		
		public function delete($id_cliente) 
		{
			if ($this->request->is ( 'get' )) {
				throw new MethodNotAllowedException ();
			}
			
			if ($this->Cliente->delete ( $id_cliente )) {
				$this->Session->setFlash ( __ ( 'Usuário excluido com sucesso!', "flash_notification" ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
		}
		
		public function enviar_email(){
			$this->layout='home';
		}
		
		public function verificar_email($username=null)
		{
			$this->layout='home';
			$sql=$this->Cliente->query("select exists (select tb_pessoa.username from tb_pessoa where tb_pessoa.username='".$username."');");
			return $sql;
		}
		public function email($username=null)
		{
			$this->layout='home';
			$verificar=$this->verificar_email($username);
			
			$verificar_email=$verificar[0][0]["exists (select tb_pessoa.username from tb_pessoa where tb_pessoa.username='".$username."')"];
			
			if($verificar_email==1)
			{
				$novaSenha = $this->geraSenha();
				$this->alterarSenha($novaSenha, $username);
				$Email = new CakeEmail('gmail');
				$Email->to($username);
				$Email->subject('Nova Senha ProFinder');
				$Email->replyTo('profindertcc@gmail.com');
				$Email->from('profindertcc@gmail.com');
				$Email->send("Sua nova senha é ".$novaSenha);
				
				return $this->redirect(array('action' => 'cadastro'));
			}
			else
			{
				$this->Session->setFlash ( __ ( 'Esse e-mail não está cadastrado na base de dados!', "flash_notification" ) );
				return $this->redirect(array('action' => 'cadastro'));
				
			}
			
			
			//return $this->redirect(array('action' => 'index'));
		}
		
		public function perfil()
		{
			$this->layout = 'home';
		}
		
		public function dadosCliente($id)
		{
			$sql=$this->Cliente->query("SELECT tb_pessoa.* FROM tb_pessoa WHERE tb_pessoa.id ='".$id."';");
			return $sql;
		}
		
		public function alterarSenha($senha, $email)
		{
			$passHash = new SimplePasswordHasher();
			$senha = $passHash->hash($senha);
			$sql=$this->Cliente->query("UPDATE tb_pessoa SET tb_pessoa.password='".$senha."' WHERE tb_pessoa.username ='".$email."';");
		}
		
		public function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
		{
			// Caracteres de cada tipo
			$lmin = 'abcdefghijklmnopqrstuvwxyz';
			$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$num = '1234567890';
		
			// Variáveis internas
			$retorno = '';
			$caracteres = '';
		
			// Agrupamos todos os caracteres que poderão ser utilizados
			$caracteres .= $lmin;
			if ($maiusculas) $caracteres .= $lmai;
			if ($numeros) $caracteres .= $num;
		
			// Calculamos o total de caracteres possíveis
			$len = strlen($caracteres);
		
			for ($n = 1; $n <= $tamanho; $n++) {
				// Criamos um número aleatório de 1 até $len para pegar um dos caracteres
				$rand = mt_rand(1, $len);
				// Concatenamos um dos caracteres na variável $retorno
				$retorno .= $caracteres[$rand-1];
			}
			
			return $retorno;
		}
		
		public function salvarTelefone($ddd, $tipo, $numero, $id)
		{
			$sql=$this->Cliente->query("insert into tb_telefone (ddd_telefone, tipo_telefone, numero_telefone, pessoa_id) values (".$ddd.", '".$tipo."', ".$numero.",".$id.");");
			return $sql;
		}
		
		public function buscarTelefone($id)
		{
			$sql=$this->Cliente->query("select * from tb_telefone where tb_telefone.pessoa_id=".$id.";");
			return $sql;
		}
		
		public function deletarTelefone($id)
		{
			$sql=$this->Cliente->query("delete from tb_telefone where pessoa_id=".$id.";");
			return $sql;
		}
		
		public function tipoCliente($tipo) 
		{
			$this->Session->write('tipoCliente', $tipo);
		}
	}
?>