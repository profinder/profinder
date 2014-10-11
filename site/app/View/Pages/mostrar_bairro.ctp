<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<h2>Selecione os bairros que você está disponível a atender: </h2>
					<hr>
					<?php
						
						$cidade = $this->Session->read('cidade');
						$idAnuncio = $this->Session->read('idAnuncio');
						$pages = new PagesController;
						$pages->constructClasses();
						$bairros=$pages->bairros($cidade);
						
						$contador=0;
						?>
							<form name="formBairro" action="/profinder/site/pages/checkValue" method="post">
							<?php
							while ($contador!=sizeof($bairros)){
								$bairro_nome=$bairros[$contador]['tb_bairro']['nome_bairro'];
								$bairro_id=$bairros[$contador]['tb_bairro']['id'];
						?>
						
							
							<input type="checkbox" name='<?php echo $bairro_id?>'> <?php echo $bairro_nome?> <br/>
							
							
						<?php
								$contador++;
							}
						?>
							<input type="submit" value="Enviar Dados"/>
							<input type="reset" value="Limpar"/>
						</form>
						
			 	</div>
			</div>
		</div>
	</div>
</div>