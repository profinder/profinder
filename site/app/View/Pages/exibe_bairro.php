<?php
	include "connection.php";
	$nome = $_GET['nome'];
	$sql = mysql_query("select tb_bairro.nome_bairro from tb_bairro inner join tb_logradouro on tb_logradouro.id_bairro=tb_bairro.id inner join tb_localidade on tb_logradouro.id_cidade=tb_localidade.id where tb_localidade.nome_localidade='$nome'");
	while ($row = mysql_fetch_array($sql)){
		$nome = $row['nome_bairro'];
		
		echo '<option value="'.$nome.'">"'.$nome.'"</option>';
	}

?>