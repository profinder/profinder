<?php
	$categoria = $_GET['categoria'];  //codigo do estado passado por parametro
	
	App::import('Controller', 'Servicos');
	$servico = new ServicosController;
	$servico->constructClasses();
	$sql = $servico->servicosCategoria($categoria);
	for ($i = 0; $i < sizeof($sql); $i++) 
	{
		$id = $sql[$i]['tb_servico']['id']; 
		$nome = $sql[$i]['tb_servico']['nome_servico'];
		echo '<option value="'.$id.'" class="servicosOption">'.$nome.'</option>';
	}
?>