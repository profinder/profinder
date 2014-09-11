<h4>Dados do Administrador</h4>
<br>
<li> Nome: <?php echo h($user['User']['nome_pessoa']); ?> </li>
<br/>
<li> Login: <?php echo $user['User']['username']; ?></li>
<br/>
<li> Regra: <?php echo $user['User']['role']; ?></li>
<br/> <br/><center>
<?php
	echo " ";
	echo $this->Html->link(
			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
			array('controller' => 'Users','action' => 'index'),
			array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
	);
?>
</center>
