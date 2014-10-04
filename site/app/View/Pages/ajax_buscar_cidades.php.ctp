<?php
	$estado = $_GET['estado'];  //codigo do estado passado por parametro
	
	App::import('Controller', 'Cidades');
	$cidades = new CidadesController;
	$cidades->constructClasses();
	$sql = $cidades->cidades($estado);
	for ($i = 0; $i < sizeof($sql); $i++) 
	{
		$nome = $sql[$i]['tb_cidade']['nome_cidade'];
		echo '<option value="'.$nome.'" class="cidadesOption">'.$nome.'</option>';
	}
?>