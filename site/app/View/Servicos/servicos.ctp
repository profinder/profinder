<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
	
</head>
<body>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">	
					<?php
						$categoria = $_GET["cat"];	
						$servicosController = new ServicosController();
						$servicosController->constructClasses();
						$servicos = $servicosController->servicos($categoria);
						
						$contador = 0;
						while ( $contador != sizeof ( $servicos) ) {
							$nome = $servicos [$contador] ['tb_servico'] ['nome_servico'];
							$id = $servicos [$contador] ['tb_servico'] ['id'];
							
							echo "<li><a href = '/profinder/site/anuncios/anuncios?serv=".$id;
							echo "'>$nome</a></li>";
								
							$contador++;
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>