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
			
					<h2>Meus anúncios</h2>
					
					<?php 
						$anuncios = new AnunciosController;
						$anuncios->constructClasses();
						$profissionalAnuncios = $anuncios->profissionalAnuncios(AuthComponent::user('id'));
						
						$contador=0;
						while ($contador!=sizeof($profissionalAnuncios))
						{
							$titulo = $profissionalAnuncios[$contador]['tb_anuncio']['titulo_anuncio'];
							$id = $profissionalAnuncios[$contador]['tb_anuncio']['id'];
							$descricao = $profissionalAnuncios[$contador]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $profissionalAnuncios[$contador]['tb_anuncio']['modo_atendimento'];
							
							//echo $anuncio_titulo;
							//echo "<br/>";
							
					?>
					<div class="panel panel-warning">
								<div class="panel-body">
									<h4>
									<?php echo $titulo; ?></a></h4>
									<hr>
									<br />
									
									<?php
						        		echo $this->Form->postLink(
						        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Remover",
						        		array('controller' => 'anuncios','action' => 'remover', $id),
						        		array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
						        	?>
									
									<div class="panel panel-default"
										style="height: 152px; width: 152x; float: left;">
										<?php
											$foto = $anuncios->caminho_foto ( $id );
											
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
													</div><?php 
											}
											?>
													</div>
												</div>
												
			
									<?php 		
											$contador++;
										}
									?>
								</div>
								
					<?php 
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-plus')) . " Novo Anúncio",
								array('controller' => 'Anuncios','action' => 'cadastro'),
								array('role' => 'button', 'class' => 'btn btn-success', 'escape' => false));
							
					?>
						</div>							
					</div>
					</div>
					</div>