<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/shop-homepage.css" rel="stylesheet">
	<style type="text/css">
	<!--
        	p {font-weight: bold;}
	-->
	</style>
	
</head>
<body>
	<div class="main" style = "background-color: #f0f0f0;">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">	
					<div class="container">
						<div class="row">
							
							<?php 
								$servico = $_GET["serv"];
								$pagina = $_GET["pag"];
								$limite=($pagina*10);
								$contadorLimite=($limite-10)+1;
								
								$anunciosController = new AnunciosController ();
								$anunciosController->constructClasses ();
								$anuncios = $anunciosController->anuncios ();
								$anunciosAvaliacao = $anunciosController->anunciosOrdemAvaliacao($servico);
								$qnt_anuncios=sizeof($anunciosAvaliacao)+sizeof($anuncios);
								$qnt_anuncios=sizeof($anunciosAvaliacao)+sizeof($anuncios);
								
								if($contadorLimite>=sizeof($anunciosAvaliacao))
								{
									$contador3=$contadorLimite;
								}
								else if($contadorLimite<sizeof($anunciosAvaliacao))
								{
									
									$contador3=$contadorLimite+sizeof($anunciosAvaliacao);
								}
								
								App::import('Controller', 'Cidades');
				
								$cidades = new CidadesController;
								$cidades->constructClasses();
								$estados = $cidades->estados();
								
								App::import('Controller', 'Avaliacaos');
								$avalicaoController = new AvaliacaosController;
								$avalicaoController->constructClasses();
								
								if( $anuncios == null ) 
								{
									echo "Nenhum Anúncio cadastrado!";
									echo "</br>";
									echo "</br>";
									echo "</br>";
									echo "</br>";
									echo "</div></div></div></div></div>";
								} 
								else 
								{?>
									<form name="formBairros" action="/profinder/site/anuncios/anuncioBairro?pag=1&serv=<?php echo $servico; ?>" method="post">
							            <div class="col-md-3">
							                <p class="lead"><font size = "4" color = "black">Pesquise por bairro:</font></p>
							                <div class="list-group">
							                
							                    <a href="#" class="list-group-item">
													<select name="estado" id="estado" style="width:200px">
														<option value="">Estado</option>
															<?php 
															   $contador=0;
																while ($contador<sizeof($estados))
																{
																  echo "<option value='{$estados[$contador]['tb_cidade']['estado_cidade']}'>{$estados[$contador]['tb_cidade']['estado_cidade']}</option>";
																  $contador++;
																}
															?>
													</select>
												</a>
							                    <a href="#" class="list-group-item">
							                    	<select id="cidadesSelect" name="cidadesSelect" style="width:200px">
														<option>Cidade</option>
													</select>
							                    </a>
							                    <a href="#" class="list-group-item">
							                    	<select id="bairros" name="bairros" style="width:200px">
														<option>Bairro</option>
													</select>
							                    </a>
							                    <a href="#" class="list-group-item">
							                    	<?php 
														echo $this->Form->button(
															$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search'))."",
															array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
														);
													?>
							                    </a>
							                </div>
							            </div>
									</form>
									<div align = "left" style = "width: 875px; float: left;">
							<?php 	if ( $anunciosAvaliacao != null && $contadorLimite<sizeof($anunciosAvaliacao))
									{
										$contador = $contadorLimite;
										
										while ( $contador != sizeof ( $anunciosAvaliacao ) && $contadorLimite<=$limite) 
										{
											$titulo = $anunciosAvaliacao [$contador] ['tb_anuncio'] ['titulo_anuncio'];
											$id = $anunciosAvaliacao [$contador] ['tb_anuncio'] ['id'];
											$descricao = $anunciosAvaliacao [$contador] ['tb_anuncio'] ['descricao_anuncio'];
											$modo_atendimento = $anunciosAvaliacao [$contador] ['tb_anuncio'] ['modo_atendimento'];
											
											$profissional = $anunciosController->dadosProfissionalAnuncio ( $id );
											$nome_profissional = $profissional [0] ['tb_pessoa'] ['nome_pessoa'];
											$id_profissional = $profissional [0] ['tb_pessoa'] ['id'];
									
											$sqlavaliacao = $avalicaoController->buscarAvaliacao($id);
											$quantidadeAvaliacoes = $avalicaoController->quantidadeAvaliacao($id);
											
											if( $quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'] != 0 )
											{
												$sql = ($sqlavaliacao[0][0]['sum(tb_avaliacao.nota_avaliacao)'])/$quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'];	
												$quantidadeVotos=$avalicaoController->quantidadeVotos($id);	
												$qtdVotos=$quantidadeVotos[0][0]['count(tb_avaliacao.nota_avaliacao)'];		
											}?> 		
									
											<form action="/profinder/site/pedidos/cadastro" id="idAnuncio" method="post" accept-charset="utf-8">
									            <div class = "panel panel-default" align="left" style="height: 379px; width: 270px; float: left; margin-left: 10px;">
									            <?php 
									            /*
									             * <div class = "panel panel-default" align="left" style="background-color: gray; height: 379px; width: 270px; float: left; margin-left: 10px;">
									             * */
									             
									            ?>
													<div class = "panel panel-default" align="left" style="height: 160px; width: 260px; float: left; margin-left: 4px; margin-top: 4px;">
														<?php 
															$foto = $anunciosController->caminho_foto ( $id );
			
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
														<input type="checkbox" name="anuncio[]"	value=<?php echo $id ?> /> 
														<a href = "#"><font size = "4"> <?php echo $titulo.$id; ?> </font></a>
														<br /><br />
														<span class="fa fa-spinner fa-spin"></span>
														<?php echo substr($descricao, 0, 100) . "..."; ?>
														<br />
														<br />
														<?php echo "<font color = '#b8b8b8'> Modo de atendimento:   " . $modo_atendimento. "</font>"; ?>
													</div>
													<div align="left" style="height: 25px; width: 260px; float: left; margin-left: 4px;">
														<?php 
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
														?>
													</div>
												</div>
										
									<?php 	$contador++;
											$contadorLimite++;
											?>
										
										<?php 
										}	
									}
									if($pagina==1)
									{
										$contador2 = $contadorLimite-sizeof($anunciosAvaliacao);
									}
									else
									{
										$contador2 = $contadorLimite-sizeof($anunciosAvaliacao)-1;
									}
									while ( $contador2 != sizeof ( $anuncios ) && $contador3<$limite) 
									{
									
										$titulo = $anuncios [$contador2] ['tb_anuncio'] ['titulo_anuncio'];
										$id = $anuncios [$contador2] ['tb_anuncio'] ['id'];
										$descricao = $anuncios [$contador2] ['tb_anuncio'] ['descricao_anuncio'];
										$modo_atendimento = $anuncios [$contador2] ['tb_anuncio'] ['modo_atendimento'];
										
										$profissional = $anunciosController->dadosProfissionalAnuncio ( $id );
										$nome_profissional = $profissional [0] ['tb_pessoa'] ['nome_pessoa'];
										$id_profissional = $profissional [0] ['tb_pessoa'] ['id'];
								
										$sqlavaliacao = $avalicaoController->buscarAvaliacao($id);
										$quantidadeAvaliacoes = $avalicaoController->quantidadeAvaliacao($id);
										
										if( $quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'] != 0 )
										{
											$sql = ($sqlavaliacao[0][0]['sum(tb_avaliacao.nota_avaliacao)'])/$quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'];	
											$quantidadeVotos=$avalicaoController->quantidadeVotos($id);	
											$qtdVotos=$quantidadeVotos[0][0]['count(tb_avaliacao.nota_avaliacao)'];		
										}?> 		
										
										<div class = "panel panel-default" align="left" style="height: 379px; width: 270px; float: left; margin-left: 10px;">
										<div class = "panel panel-default" align="left" style="height: 160px; width: 260px; float: left; margin-left: 4px; margin-top: 4px;">
											<?php 
												$foto = $anunciosController->caminho_foto ( $id );

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
											<input type="checkbox" name="anuncio[]"	value=<?php echo $id ?> /> 
											<a href = "#"><font size = "4"> <?php echo $titulo.$id; ?> </font></a>
											<br /><br />
											<span class="fa fa-spinner fa-spin"></span>
											<?php echo substr($descricao, 0, 100) . "..."; ?>
											<br />
											<br />
											<?php echo "<font color = '#b8b8b8'> Modo de atendimento:   " . $modo_atendimento. "</font>"; ?>
										</div>
										<div align="left" style="height: 160px; width: 260px; float: left; margin-left: 4px;">
											<center> Nenhuma avaliação. </center>
										</div>
									</div>
											
								<?php 	$contador2++;
										$contador3++;
									}	
								?>			
									</div>	
									<?php if( AuthComponent::user('role') == "cliente" )
									{
										echo "<center><button type = 'submit' class='btn btn-default'>Solicitar Pedido</button></center>";
				            		?></form><?php 
									}?>
				        			<center>
									<ul class="pagination">
										<li><a href="/profinder/site/anuncios/anuncios?pag=1&serv=<?php echo $servico;?>">&laquo;</a></li>
										<?php
										$contador = 1;
										while ( $contador < ((sizeof($anunciosAvaliacao) + sizeof($anuncios))/10)+1 ) {
										?>
										  <li><a href="/profinder/site/anuncios/anuncios?pag=<?php echo $contador;?>&serv=<?php echo $servico;?>"><?php echo $contador?></a></li>
										<?php
											$contador++;
										}
										?>
										  <li><a href="/profinder/site/anuncios/anuncios?pag=<?php echo round((sizeof($anuncios) + (sizeof($anunciosAvaliacao)))/10);?>&serv=<?php echo $servico;?>">&raquo;</a></li>
									</ul>
									</center>
						</div>
			 		</div>
				</div>
			</div>
		</div>
	</div>
<?php 
	}
?>		
</body></html>
<script>
	$(function(){
		$("#estado").change(function(){
		var estado = $(this).val();
			$.ajax({
				type:"POST",
				url: "/profinder/site/pages/ajax_buscar_cidades.php?estado="+estado,
				dataType:"text",
				success: function(res){
					$("#cidadesSelect").children(".cidadesOption").remove();
					$("#cidadesSelect").append(res);
				}
		});
	});
});

$(function(){
		$("#cidadesSelect").change(function(){
		var cidade = $(this).val();
			$.ajax({
				type:"POST",
				url: "/profinder/site/pages/ajax_buscar_bairros.php?cidade="+cidade,
				dataType:"text",
				success: function(res){
					$("#bairros").children(".bairrosOption").remove();
					$("#bairros").append(res);
				}
		});
	});
});
</script>
<script src="js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>