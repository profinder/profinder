<?php
	class DashboardController extends AppController
	{
		public $helpers = array('Html', 'Form');
		
		public function beforeFilter()
		{
			$this->Auth->allow('index');
		}
		
		public function index() 
		{
			//$this->layout = 'home';
			$userId = $this->Auth->user("id");
			
			//var_dump("dash");
			if($this->Auth->user("role")=="cliente")
			{
				return $this->redirect(array('controller' => 'pages', 'action' => 'clienteHome'));
			}
			if($this->Auth->user("role")=="profissional")
			{
				return $this->redirect(array('controller' => 'pages', 'action' => 'profissionalHome'));
			}
			if ( $userId == null || $userId == "0" )
			{
				return $this->redirect(array('controller'=> 'Users', 'action' => 'index'));
			}
	    }    
	}
?>