<h1>Novo Bairro</h1>
<?php
	echo $this->Form->create('Bairro');
	echo $this->Form->input('nome_bairro');
	echo $this->Form->input('estado_bairro');
	
	echo $this->Form->button(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
			array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
	);
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
			array('controller' => 'Bairros','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
	
	echo $this->Form->end();
?>