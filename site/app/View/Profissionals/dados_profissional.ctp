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
					<h4>Dados do Profissional</h4>
					<br />
					<?php  
						$id = $_GET['id'];
						App::import('Controller', 'Profissionals');
						$profissionalController = new ProfissionalsController;
						$profissionalController->constructClasses();
						$profissional = $profissionalController->dadosProfissional($id);
						
						App::import('Controller', 'Anuncios');
						$anuncioController = new AnunciosController;
						$anuncioController->constructClasses();
						$anunciosProfissional = $anuncioController->profissionalAnuncios($id);
						
						echo "Nome: ".$profissional[0]['tb_pessoa']['nome_pessoa']."</br>";
						echo "E-mail: ".$profissional[0]['tb_pessoa']['username']."</br>";
						
						$contador = 0;
						echo "<h4>Anúncios</h4>";
						while( $contador != sizeof ( $anunciosProfissional ) )
						{
							$titulo = $anunciosProfissional [$contador] ['tb_anuncio'] ['titulo_anuncio'];
							$id = $anunciosProfissional [$contador] ['tb_anuncio'] ['id'];
							$descricao = $anunciosProfissional [$contador] ['tb_anuncio'] ['descricao_anuncio'];
							$modo_atendimento = $anunciosProfissional [$contador] ['tb_anuncio'] ['modo_atendimento'];
							?>
							
					
							<form action="/profinder/site/pedidos/cadastro" id="idAnuncio"
						method="post" accept-charset="utf-8">
						<div class="top-box">
							<div class="panel panel-warning">
								<div class="panel-body">
									<h4>
										<input type="hidden" name="anuncio[]"
											value=<?php echo $id ?> /> <?php echo $titulo; ?> </h4>
									<hr>
									<br />

									<div class="panel panel-default"
										style="height: 152px; width: 152x; float: left;">
										<?php
							$foto = $anuncioController->caminho_foto ( $id );
							
							if ($foto == null || $foto == 0) {
								echo "<a href='/profinder/site/anuncios/detalhesAnuncio?id=" . $id . "'><img src='/profinder/site/img/sem-foto.jpg' height='150' width='150' style= 'padding-top:0px'> </a>";
							} else {
								echo "<a href='/profinder/site/anuncios/detalhesAnuncio?id=" . $id . "'><img src='" . $foto [0] ['tb_foto'] ['caminho_foto'] . "' height='150' width='150' style= 'padding-top:0px'> </a>";
							}
							?>
									</div>
									<div align="left"
										style="height: 202x; width: 700px; float: left; margin-left: 10px;">
									 	<?php
											echo "Descrição: <br /> <br /> <center>";
											echo $descricao;
											echo "</center><br /><br />";
											echo "Modo de atendimento: ";
											
											if ($modo_atendimento == "escritorio") {
												echo "Escritório.";
												echo "<font color = '#aaacae'> Endereço ao lado (Google Maps) </font>";
											} else if ($modo_atendimento == "domiciliar") {
												echo "Domiciliar.";
											} else if ($modo_atendimento == "online") {
												echo "On-line.";
											}
											echo "<br /> <br />";
										?>
									</div>
									<?php
							if ($modo_atendimento == "escritorio") {
								?>
									
									<div class="panel panel-default" align="left"
										style="height: 152px; width: 152px; float: left; margin-left: 10px;">
										<?php
								echo "<img src = '/profinder/site/img/googlemaps.png' height = '152' width = '152' style = 'padding-top:0px'>";
							}
							?>
									</div>
								</div>
							</div>
						<?php 		
							$contador++;
						}?>
					</form>		
			 	</div>
			</div>
		</div>
	</div>
</div>