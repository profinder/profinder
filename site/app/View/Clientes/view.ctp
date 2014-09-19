<h4>Dados do Bairro</h4>
<br>
<li><p>Código: <?php echo h($bairro['Bairro']['id']); ?></p></li>
<br/> 
<li><p>Nome: <?php echo h($bairro['Bairro']['nome_bairro']); ?></p></li>
<br/>
<li><p>Estado: <?php echo h($bairro['Bairro']['estado_bairro']); ?></p></li>

<br/><br/><center>
<?php
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
			array('controller' => 'Bairros','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
?>
</center>