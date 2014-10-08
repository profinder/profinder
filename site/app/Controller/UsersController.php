<?php
	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
	App::uses('CakeEmail', 'Network/Email');
	
	class UsersController extends AppController
	{
		public $helpers = array('Html', 'Form');
		
		public function beforeFilter() 
		{
			parent::beforeFilter();
			$this->Auth->allow('logout', 'login');
		}
		
		public function isAuthorized($user) 
		{
			return parent::isAuthorized($user);
		}
		
		public function login() 
		{
			$this->layout = 'home';
		
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->redirect());
				}
				//$this->Session->setFlash(__('Erro no login, usuário e/ou senha incorretos'), "flash_notification");
			}
		}
		
		public function logout() 
		{
			return $this->redirect($this->Auth->logout());
		}
		
		public function index() 
		{
	         $this->set('usuarios', $this->User->find('all'));
	    }
	
	    public function view($id = null) 
	    {
	    	$this->layout = 'clean';
	        if (!$id) {
	            throw new NotFoundException(__('Administrador inválido'));
	        }
	
	        $user = $this->User->findById($id);
	        if (!$user) {
	            throw new NotFoundException(__('Administrador inválido'));
	        }
	        $this->set('user', $user);
	    }
	    
	 	
	    public function add()
	    {
	    	$this->layout = 'clean';
	    	if ($this->request->is('post'))
	    	{
	    		$this->User->create();
	    		
	    		var_dump($this->request->data);
				if ($this->request->data['Telefone'][1]['ddd_telefone']=='')
				{
					unset($this->request->data['Telefone'][1]);
				}	
				if ($this->request->data['Telefone'][2]['ddd_telefone']=='')
				{
					unset($this->request->data['Telefone'][2]);
				}	
	    		$passHash = new SimplePasswordHasher();
	    		$this->request->data["password"] = $passHash->hash($this->request->data["password"]);
	    		if ($this->User->saveAssociated($this->request->data))
	    		{
	    			$savedata = Array('User' => $this->request->data['User']);
					$this->User->save($savedata);
					
				//	$savedata = Array('User', 'Telefone' => $this->request->data['User']);
					//$savedata['User'] = array('id' => $this->User->getLastInsertId());
					
					//$this->User->Telefone->create();
					//$this->User->Telefone->save($savedata);
	    			$this->Session->setFlash(__('Administrador criado com sucesso.'), "flash_notification");
	    			return $this->redirect(array('action' => 'index'));
	    		}
	    		$this->Session->setFlash(__('Erro ao criar Administrador.'));
	    	}
	    }
	    
	    public function edit($id = null) 
	    {
	    	if (!$id) {
	    		throw new NotFoundException(__('Administrador inválido 1'));
	    	}
	    
	    	$user = $this->User->findById($id);
	    	if (!$user) {
	    		throw new NotFoundException(__('Administrador inválido 2'));
	    	}
	    	$this->layout = 'default';
	    	if ($this->request->is(array('post', 'put'))) {
	    		$this->User->id = $id;
	    		if ($this->User->save($this->request->data)) {
	    			$this->Session->setFlash(__('Administrador atualizado com sucesso.'), "flash_notification");
	    			return $this->redirect(array('action' => 'index'));
	    		}
	    		$this->Session->setFlash(__('Erro ao atualizar dados.'));
	    	}
	    
	    	if (!$this->request->data) {
	    		$this->request->data = $user;
	    	}
	    }
	    
	    public function delete($id) 
	    {
	    	if ($this->request->is('get'))
	    	{
	    		throw new MethodNotAllowedException();
	    	}
	    
	    	if ($this->User->delete($id))
	    	{
	    		$this->Session->setFlash(__('Usuário excluído com sucesso.'), "flash_notification");
	    		return $this->logout();
	    	}
	    }
	    
		public function listarAdministradores()
		{
			$sql=$this->User->query("SELECT tb_pessoa.* FROM tb_pessoa WHERE tb_pessoa.role = 'admin'");
			return $sql;
		}
		
		public function send_email($dest=null)
		{
			$Email = new CakeEmail('gmail');
			$Email->to($dest);
			$Email->subject('Automagically generated email');
			$Email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
			$Email->message('teste');
			$Email->from ('profindertcc@gmail.com');
			$Email->send();
			return $this->redirect(array('action' => 'index'));
		}
	}
?>