<center><h4> Dados do Logradouro </h4></center>
<br /><br />

<li>Código: <?php echo h($logradouro['Logradouro']['id']); ?></li>

<li>CEP: <?php echo $logradouro['Logradouro']['cep_logradouro']; ?></li>

<li>Nome: <?php echo $logradouro['Logradouro']['nome_logradouro']; ?></li>

<li>Nome completo: <?php echo $logradouro['Logradouro']['nome_logradouro_completo']; ?></li>

<li>Tipo: <?php echo $logradouro['Logradouro']['tipo_logradouro']; ?></li>

<li>Estado: <?php echo $logradouro['Logradouro']['uf_logradouro']; ?></li>

<li>Id do bairro fim <?php echo $logradouro['Logradouro']['id_bairro_fim']; ?></li>

<li>Id do bairro: <?php echo $logradouro['Logradouro']['id_bairro']; ?></li>

<li>Id da cidade <?php echo $logradouro['Logradouro']['id_cidade']; ?></li>
<br />

<?php 
	echo $this->Html->link(
		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Voltar",
		array('controller' => 'logradouros','action' => 'index'),
		array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));			
?>