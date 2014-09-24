<center><h4>Dados do Administrador</h4></center>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('nome_pessoa', array('label' => 'Nome:'));
	echo $this->Form->input('username', array('label' => 'E-mail:'));
	echo $this->Form->input('password', array('label' => 'Senha:'));
	echo $this->Form->input('role', array('type' => 'hidden', 'value' => 'admin'));
	
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->button(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
			array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
	);
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
			array('controller' => 'Users', 'action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
	echo $this->Form->end();
?>