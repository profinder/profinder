<h4>Dados da Cidade</h4>
<br/>
<li><p>Código: <?php echo h($cidade['Cidade']['id']); ?></p></li>
<br>
<li><p>Nome: <?php echo h($cidade['Cidade']['nome_cidade']); ?></p></li>
<br>
<li><p>Cep: <?php echo h($cidade['Cidade']['cep_cidade']); ?></p></li>
<br>
<li><p>Estado: <?php echo h($cidade['Cidade']['estado_cidade']); ?></p></li>
<br/> <br/><center>
<?php
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
			array('controller' => 'Cidades','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
?>
</center>
