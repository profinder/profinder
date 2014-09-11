<h4>Dados do Servico</h4>
<br>
<li><p>Código: <?php echo h($servico['Servico']['id']); ?></p></li>
<br/>
<li><p>Nome: <?php echo h($servico['Servico']['nome_servico']); ?></p></li>
<br/>
<li><p>Código da categoria: <?php echo h($servico['Servico']['id_categoria']); ?></p></li>

<br/> <br/><center>
<?php
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
			array('controller' => 'Servicos','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
?>
</center>

