<h1>Novo Bairro</h1>
<?php
	echo $this->Form->create('Logradouro');
	echo $this->Form->input('cep_logradouro');
	echo $this->Form->input('nome_logradouro');
	echo $this->Form->input('nome_logradouro_completo');
	echo $this->Form->input('tipo_logradouro');
	echo $this->Form->input('uf_logradouro');
	echo $this->Form->input('id_bairro');
	echo $this->Form->input('id_cidade');
	
	echo $this->Form->button(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
			array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
	);
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
			array('controller' => 'Logradouros','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
	
	echo $this->Form->end();
?>