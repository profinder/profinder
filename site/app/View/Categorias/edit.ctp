<h4>Dados da Categoria</h4>
<?php  
	echo $this->Form->create('Categoria');
	echo $this->Form->input('nome_categoria');
	
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->button(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
			array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
	);
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
			array('controller' => 'Categorias', 'action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
	echo $this->Form->end();
?>