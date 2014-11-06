<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="main" style = "background-color: #f0f0f0;">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<div class="btn-group btn-group-justified">
						<?php 
							echo $this->Html->link(
			        			$this->Html->tag('span', '', array('class' => '')) . " Ativos",
			        			array('controller' => 'anuncios', 'action' => 'profissionalAnunciosAtivos', '?pag=1'),
								array('class' => 'btn btn-success', 'escape' => false));
							echo $this->Html->link(
			        			$this->Html->tag('span', '', array('class' => '')) . " Inativos",
			        			array('controller' => 'anuncios', 'action' => 'profissionalAnunciosInativos', '?pag=1'),
								array('class' => 'btn btn-default', 'escape' => false));
						?>
					</div>
					<br /><br />
					<?php 
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-plus')) . " Novo Anúncio",
								array('controller' => 'Anuncios','action' => 'cadastro'),
								array('role' => 'button', 'class' => 'btn btn-success', 'escape' => false));
							
					?>
					<br/><br/>
					<div align = "center">
					<?php 
						$pagina = $_GET["pag"];
						$limite=($pagina*8);
						$contadorLimite=($limite-8)+1;
						$anuncios = new AnunciosController;
						$anuncios->constructClasses();
						
						App::import('Controller', 'Avaliacaos');
						$avalicaoController = new AvaliacaosController;
						$avalicaoController->constructClasses();
						
						$profissionalAnuncios = $anuncios->profissionalAnunciosAtivos(AuthComponent::user('id'));
						
						$contador=0;
						$contador = $contadorLimite;
						
						if($profissionalAnuncios == null)
						{
							echo "Nenhum anúncio ativo.";
						}
						else
						{
						while ($contador != sizeof ( $profissionalAnuncios ) && $contadorLimite<=$limite)
						{
							$titulo = $profissionalAnuncios[$contador]['tb_anuncio']['titulo_anuncio'];
							$id = $profissionalAnuncios[$contador]['tb_anuncio']['id'];
							$descricao = $profissionalAnuncios[$contador]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $profissionalAnuncios[$contador]['tb_anuncio']['modo_atendimento'];
							
							$pedidosAnuncio = $anuncios->pedidosAnuncio($id);
							
							$profissional = $anuncios->dadosProfissionalAnuncio ( $id );
							$nome_profissional = $profissional [0] ['tb_pessoa'] ['nome_pessoa'];
							$id_profissional = $profissional [0] ['tb_pessoa'] ['id'];
								
							$sqlavaliacao = $avalicaoController->buscarAvaliacao($id);
							$quantidadeAvaliacoes = $avalicaoController->quantidadeAvaliacao($id);

							$anunciosAvaliacao = $avalicaoController->anuncioComAvaliacao($id);
														
							if( $quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'] != 0 )
							{
								$sql = ($sqlavaliacao[0][0]['sum(tb_avaliacao.nota_avaliacao)'])/$quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'];	
								$quantidadeVotos=$avalicaoController->quantidadeVotos($id);	
								$qtdVotos=$quantidadeVotos[0][0]['count(tb_avaliacao.nota_avaliacao)'];		
							}?> 		
										
							<div class = "panel panel-default" align="left" style="height: 379px; width: 285px; float: left; margin-left: 10px;">
								<div class = "panel panel-default" align="left" style="height: 160px; width: 275px; float: left; margin-left: 4px; margin-top: 4px;">
									<?php 
										$foto = $anuncios->caminho_foto ( $id );
										if ($foto == null || $foto == 0) 
										{
											echo "<a href='/profinder/site/anuncios/detalhesAnuncio?id=" . $id . "'><img src='/profinder/site/img/sem-foto.jpg' height='150' width='270' style= 'padding-top:0px'> </a>";
										} 
										else 
										{
											echo "<center><a href='/profinder/site/anuncios/detalhesAnuncio?id=" . $id . "'><img src='" . $foto [0] ['tb_foto'] ['caminho_foto'] . "' height='150' style= 'padding-top:0px'> </a></center>";
										}
									?>
								</div>
								<div align="left" style="height: 160px; width: 260px; float: left; margin-left: 4px;">
									<a href = "#"><font size = "4"> <?php echo $titulo.$id; ?> </font></a>
									<br /><br />
									<span class="fa fa-spinner fa-spin"></span>
									<?php echo substr($descricao, 0, 100) . "..."; ?>
									<br /><br />
									<?php echo "<font color = '#b8b8b8'> Modo de atendimento:   " . $modo_atendimento. "</font>"; ?>
								</div>
								<div align="left" style="height: 160px; width: 260px; float: left; margin-left: 4px;">
									<?php 
										if($anunciosAvaliacao == null)
										{
											echo "<center> Nenhuma avaliação. </center>";
										}	
										else
										{
											if ( $quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'] != 0 )
											{
												echo "<center>";
												if ($sql<=5 && $sql>4.5)
												{
													echo "<img src=/profinder/site/img/star_5.png>";
												}
												else if ($sql>4)
												{
													echo "<img src=/profinder/site/img/star_4.5.png>";
												}
												else if ($sql>3.5)
												{
													echo "<img src=/profinder/site/img/star_4.png>";
												}
												else if ($sql>3)
												{
													echo "<img src=/profinder/site/img/star_3.5.png>";
												}
												else if ($sql>2.5)
												{
													echo "<img src=/profinder/site/img/star_3.png>";
												}
												else if ($sql>2)
												{
													echo "<img src=/profinder/site/img/star_2.5.png>";
												}
												else if ($sql>1.5)
												{
													echo "<img src=/profinder/site/img/star_2.png>";
												}
												else if ($sql>1)
												{
													echo "<img src=/profinder/site/img/star_1.5.png>";
												}
												else if ($sql>0.5)
												{
													echo "<img src=/profinder/site/img/star_1.png>";
												}
												else if ($sql!=0)
												{
													echo "<img src=/profinder/site/img/star_0.5.png>";
												}
												else 
												{
													echo "<img src=/profinder/site/img/star_0.png>";
												}
											}
										}	
									?>
								</div>
								</div>
											
								<?php 	
										$contadorLimite++;
										$contador++;
									}	
								?>			
							</div>
						</div>		
						<div style="width: 340px; clear:both;"></div>			
						<center>		
						<ul class="pagination">
								<li><a href="/profinder/site/anuncios/profissionalAnunciosAtivos?pag=1">&laquo;</a></li>
								<?php
									$contador = 1;
									while ( $contador < ((sizeof($profissionalAnuncios))/8)+1 ) {
								?>
										<li><a href="/profinder/site/anuncios/profissionalAnunciosAtivos?pag=<?php echo $contador;?>"><?php echo $contador?></a></li>
										<?php
											$contador++;
									}
								?>
								<li><a href="/profinder/site/anuncios/profissionalAnunciosAtivos?pag=<?php echo round((sizeof($profissionalAnuncios))/8);?>">&raquo;</a></li>
						</ul>
						</center>
					</div>
				</div>
			<?php 
						}?>	
	</div>
	
</body>
</html>
