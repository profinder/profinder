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
					<font size = "5"> Todos as categorias </font>	
					<br /><br /><br />
					<div align="left" style="width: 1200px; float: left; margin-left: 10px;">
					<?php
						$categoriasController = new CategoriasController();
						$categoriasController->constructClasses();
						$categorias = $categoriasController->categorias();
						
						$contador = 0;
						while ( $contador != sizeof ( $categorias) ) {
							$nome = $categorias [$contador] ['tb_categoria'] ['nome_categoria'];
							$id = $categorias [$contador] ['tb_categoria'] ['id'];
							
							?>
							<div align="left" style="background-color: #f0f0f0; height: 24px; width: 280px; float: left; margin-left: 10px; margin-top:10px; border-radius:7px;">
								<center><?php echo "<a href = '/profinder/site/servicos/servicos?cat=".$id;
								echo "'><font color = #565656>$nome</font></a>"; ?></center>
							</div>
							<?php 	
							$contador++;
						}
					?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
	</div>
</body>
</html>