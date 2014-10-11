<?php
	$cidade = $_GET['cidade'];  //codigo do estado passado por parametro
	
	App::import('Controller', 'Bairros');
	$bairros = new BairrosController;
	$bairros->constructClasses();
	$sql = $bairros->bairros($cidade);
	for ($i = 0; $i < sizeof($sql); $i++) 
	{
		$nome = $sql[$i]['tb_bairro']['nome_bairro'];
		echo '<option value="'.$nome.'" class="bairrosOption">'.$nome.'</option>';
	}
?>