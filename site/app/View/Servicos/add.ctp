<h1>Nova Servico</h1>
<?php
	echo $this->Form->create('Servico');
	echo $this->Form->input('nome_servico');
	echo $this->Form->input('categoria_id');
	
	echo $this->Form->button(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
			array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
	);
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
			array('controller' => 'Servicos','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
	
	echo $this->Form->end();
?>