<?php
class EnderecosController extends AppController {
	public $helpers = array (
			'Html',
			'Form' 
	);
	public function index() {
		$this->set ( 'endereco', $this->Endereco->find ( 'all' ) );
	}
	public function view($id = null) {
		$this->layout = 'clean';
		if (! $id) {
			throw new NotFoundException ( __ ( 'Endereco inválido' ) );
		}
		
		$endereco = $this->Endereco->findById ( $id );
		if (! $endereco) {
			throw new NotFoundException ( __ ( 'Endereco não encontrada' ) );
		}
		$this->set ( 'endereco', $endereco );
	}
	public function add() {
		$this->layout = 'clean';
		if (! empty ( $this->request->data )) {
			// We can save the User data:
			// it should be in $this->request->data['User']
			
			$endereco = $this->Endereco->save($this->request->data );
			
			// If the user was saved, Now we add this information to the data
			// and save the Profile.
			
			if (! empty ( $endereco )) {
				// The ID of the newly created user has been set
				// as $this->User->id.
				$this->request->data ['Cliente'] ['endereco_id'] = $this->Endereco->id;
				
				// Because our User hasOne Profile, we can access
				// the Profile model through the User model:
				$this->Endereco->Cliente->save($this->request->data);
				
				$this->request->data ['Telefone'] ['pessoa_id'] = $this->Cliente->id;
				$this->Cliente->Telefone->save ( $this->request->data );
			}
		}
		// $enderecos = $this->Endereco->Cliente->find('list');
		// $this->set(compact('clientes'));
	}
	public function edit($id = null) {
		if (! $id) {
			throw new NotFoundException ( __ ( 'Endereco inválido' ) );
		}
		
		$endereco = $this->Endereco->findById ( $id );
		if (! $endereco) {
			throw new NotFoundException ( __ ( 'Endereco não encontrada' ) );
		}
		$this->layout = 'clean';
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
			$this->Endereco->id = $id;
			if ($this->Endereco->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'Endereco salvo com sucesso' ), "flash_notification" );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
			$this->Session->setFlash ( __ ( 'Erro ao salvar dados.' ) );
		}
		
		if (! $this->request->data) {
			$this->request->data = $endereco;
		}
	}
	public function delete($id) {
		if ($this->request->is ( 'get' )) {
			throw new MethodNotAllowedException ();
		}
		
		if ($this->Endereco->delete ( $id )) {
			$this->Session->setFlash ( __ ( 'Endereco excluido com sucesso.', "flash_notification" ) );
			return $this->redirect ( array (
					'action' => 'index' 
			) );
		}
	}
}
?>