<h1>Nova Cidade</h1>
<?php
	echo $this->Form->create('Cidade');
	echo $this->Form->input('nome_cidade');
	echo $this->Form->input('cep_cidade');
	echo $this->Form->input('estado_cidade');
	
	echo $this->Form->button(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
			array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
	);
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
			array('controller' => 'Cidades','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
	
	echo $this->Form->end();
?>