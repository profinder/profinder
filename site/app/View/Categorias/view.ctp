<h4>Dados da Categoria</h4>
<br/>
<li><p>Código: <?php echo h($categoria['Categoria']['id']); ?></p></li>
<br>
<li><p>Nome: <?php echo h($categoria['Categoria']['nome_categoria']); ?></p></li>

<br/><br/> <center>
<?php
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
			array('controller' => 'Categorias','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
?>
</center>