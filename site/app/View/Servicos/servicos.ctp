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
						$categoriaServico = $servicosController->categoriaServico($categoria);
						$nome_categoria = $categoriaServico[0]['tb_categoria']['nome_categoria'];
					?>	
					<font size = "5"> Todos os serviços da categoria <?php echo $nome_categoria; ?> </font>	
					<br /><br /><br />
					<div align="left" style="width: 1200px; float: left; margin-left: 10px;">
						<?php 	
							$contador = 0;
							while ( $contador != sizeof ( $servicos) ) {
								$nome = $servicos [$contador] ['tb_servico'] ['nome_servico'];
								$id = $servicos [$contador] ['tb_servico'] ['id'];
								?>
								<div class = "panel panel-default" align="left" style="background-color: #f0f0f0; height: 24px; width: 280px; float: left; margin-left: 10px;">
								<center>
									<?php echo "<a href = '/profinder/site/anuncios/anuncios?serv=".$id;
									echo "'><font color = gray>$nome</font></a>";?>
								</center>
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
	</div>
</body>
</html>