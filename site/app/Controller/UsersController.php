<?php
	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
	App::uses('CakeEmail', 'Network/Email');
	//CakePlugin::load('Facebook');
	
	
	class UsersController extends AppController
	{
		var $components = array('Auth'); 
		public $helpers = array('Html', 'Form'/*,'Facebook.Facebook'*/);
		
		
		public function beforeFilter() 
		{
			parent::beforeFilter();
			$this->Auth->allow('logout', 'login');
			//$this->Auth->loginRedirect = array('action' => 'index');     //3
			//$this->layout='facebook';
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
		
		/*public function login()
		{
			$this->layout = 'home';
	    	// If it is a post request we can assume this is a local login request
		    if ($this->request->isPost()){
		        if ($this->Auth->login()){
		            $this->redirect($this->Auth->redirectUrl());
		        } else {
		            $this->Session->setFlash(__('Invalid Username or password. Try again.'));
		        }
		    } 

    		// When facebook login is used, facebook always returns $_GET['code'].
			else if($this->request->query('code')){

        		// User login successful
        		$fb_user = $this->Facebook->getUser();          # Returns facebook user_id
        		if ($fb_user){
		            $fb_user = $this->Facebook->api('/me');     # Returns user information
		
		            // We will varify if a local user exists first
		            $local_user = $this->User->find('first', array(
		                'conditions' => array('username' => $fb_user['email'])
		            ));
		
		            // If exists, we will log them in
		            if ($local_user){
		                $this->Auth->login($local_user['User']);            # Manual Login
		                $this->redirect($this->Auth->redirectUrl());
		            } 
		
		            // Otherwise we ll add a new user (Registration)
	            	else {
		                $data['User'] = array(
		                    'username'      => $fb_user['email'],                               # Normally Unique
		                    'password'      => AuthComponent::password(uniqid(md5(mt_rand()))), # Set random password
		                    'role'          => 'cliente',
		                	'nome_pessoa' => $fb_user['name']
		                );

                		// You should change this part to include data validation
                		$this->User->save($data, array('validate' => false));

                		// After registration we will redirect them back here so they will be logged in
                		$this->redirect(Router::url('/users/login?code=true', true));
            		}
        		}
				else{
            		// User login failed..
        		}
	   		}
		}*/
		
		
		public function logout() 
		{
			$this->Session->destroy();
			return $this->redirect($this->Auth->logout());
		}
		
		public function index() 
		{
			$this->layout = 'default';
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
	    		$this->Session->setFlash(__('Administrador excluído com sucesso.'), "flash_notification");
	    		return $this->redirect(array('action' => 'index'));
	    	}
	    }
	    
		public function listarAdministradores()
		{
			$this->layout = 'default';
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