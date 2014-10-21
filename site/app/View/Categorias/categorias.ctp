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
						$categoriasController = new CategoriasController();
						$categoriasController->constructClasses();
						$categorias = $categoriasController->categorias();
						
						$contador = 0;
						while ( $contador != sizeof ( $categorias) ) {
							$nome = $categorias [$contador] ['tb_categoria'] ['nome_categoria'];
							$id = $categorias [$contador] ['tb_categoria'] ['id'];
							echo "<li><a href = '/profinder/site/servicos/servicos?cat=".$id;
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