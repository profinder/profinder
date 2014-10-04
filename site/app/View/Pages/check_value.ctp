<?php

	$cidade = $this->Session->read('cidade');
	$idAnuncio = $this->Session->read('idAnuncio');
	$pages = new PagesController;
	$pages->constructClasses();
	$bairros=$pages->bairros($cidade);
	$contador=0;
	var_dump($bairros);
	while ($contador!=sizeof($bairros)){
		$bairro_id=$bairros[$contador]['tb_bairro']['id'];
		
		if($_POST[$bairro_id] == "on"){
			
			$anuncioBairros=$pages->salvarAnuncioBairro($idAnuncio, $bairro_id);
		}
		$contador++;	
	}
	
?>