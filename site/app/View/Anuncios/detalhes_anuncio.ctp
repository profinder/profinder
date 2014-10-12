<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
	
</head>
<body onload="initialize()">
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
				
					<?php
						$id = $_GET['id'];
						$anunciosController = new AnunciosController;
						$anunciosController->constructClasses();
						$foto = $anunciosController->caminho_foto($id);
						
						App::import('Controller', 'Avaliacaos');
						$avalicaoController = new AvaliacaosController;
						$avalicaoController->constructClasses();
						$sqlavaliacao = $avalicaoController->buscarAvaliacao($id);
						$quantidadeAvaliacoes = $avalicaoController->quantidadeAvaliacao($id);
						$sql = ($sqlavaliacao[0][0]['sum(tb_avaliacao.nota_avaliacao)'])/$quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'];
						$quantidadeVotos=$avalicaoController->quantidadeVotos($id);	
						$qtdVotos=$quantidadeVotos[0][0]['count(tb_avaliacao.nota_avaliacao)'];		
						App::import('Controller', 'Anuncios');
						$anuncioController = new AnunciosController;
						$anuncioController->constructClasses();
						$dados = $anuncioController->dadosAnuncios($id);
						
						App::import('Controller', 'Comentarios');
						$comentarioController = new ComentariosController;
						$comentarioController->constructClasses();
						$comentarios = $comentarioController->comentariosAvaliacao($id);	
						
						/*App::import('Controller', 'Pedidos');
						$pedidoController = new PedidosController;
						$pedidoController->constructClasses();
						$aumentarQntAvaliacao = $pedidoController->aumentarQntAvaliacao($pedido_id);
						*/
					?>	
					<h4> Dados do Anúncio </h4><br />
					
					<?php if ($dados[0]['tb_anuncio']['modo_atendimento'] == "escritorio")
					{?>
						<div style="height: 300px; width: 300px; float: left;">
							<?php 
								if($foto==null||$foto==0)
								{
									echo "<div class = 'panel panel-default'>";
									echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='/profinder/site/img/sem-foto.jpg' height='300' width='300' style= 'padding-top:0px'> </a>";
									echo "</div>";
								}
								else
								{
									$contador=0;
									while ($contador<sizeof($foto))
									{
										if ($contador==0)
										{
											echo "<img src='".$foto[0]['tb_foto']['caminho_foto']."' height='300' width='300'  style= 'padding-top:0px'></br> ";
											
										}
										else
										{
											echo "<img src='".$foto[$contador]['tb_foto']['caminho_foto']."' height='300' width='300' style= 'padding-top:0px'> ";										
										}
										if ($contador==sizeof($foto)-1)
										{
											echo '</br>';
										}
										$contador++;
									}
								}
							?>
						</div>
						<div align = "left" style="margin: 2px; height: 250px; width: 550px; float: left; margin-left: 20px;">
							<?php 
								echo 'Título do anúncio: '.$dados[0]['tb_anuncio']['titulo_anuncio'];
								echo '<br /><br />Descrição do anúncio: <br /><br /><center>'.$dados[0]['tb_anuncio']['descricao_anuncio'];
								$nome_servico = $anuncioController->servicoAnuncios($dados[0]['tb_anuncio']['servico_id']);
								echo '</center><br /><br />Serviço do anúncio: '.$nome_servico[0]['tb_servico']['nome_servico'];
								echo '<br /><br />Modo de atendimento: '.$dados[0]['tb_anuncio']['modo_atendimento'];
								echo '<br /><br /><br /><center>';
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
								echo "<br/><font color = '#aaacae'>Quantidade de votos: ".$quantidadeVotos[0][0]['count(tb_avaliacao.nota_avaliacao)'].", porcentagem: ".round($sql, 2)."%</font>";
								echo '</center>'
								?>
						</div>
						<?php
							$dadosEndereco=$anunciosController->enderecoAnuncio($id);
							?> 
						
						<div id="map_canvas" style="width: 320px; height: 320px;"></div>
						  <div>
							<input id="address" type="hidden" value="<?php echo $dadosEndereco[0]['tb_endereco']['logradouro']. ','.$dadosEndereco[0]['tb_endereco']['numero_endereco'].','. $dadosEndereco[0]['tb_endereco']['localidade'].','. $dadosEndereco[0]['tb_endereco']['estado']?>">
							
						  </div>
						<?php 
						}
					else if( $dados[0]['tb_anuncio']['modo_atendimento'] == "online" || $dados[0]['tb_anuncio']['modo_atendimento'] == "domiciliar")
					{
					?>
						<div style="height: 300px; width: 300px; float: left;">
						<?php 
							if($foto==null||$foto==0){
								echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='/profinder/site/img/sem-foto.jpg' height='300' width='300' style= 'padding-top:0px'> </a>";
							}
							else
							{
								$contador=0;
								while ($contador<sizeof($foto))
								{
									if ($contador==0)
									{
										echo "<img src='".$foto[0]['tb_foto']['caminho_foto']."' height='300' width='300'  style= 'padding-top:0px'></br> ";
							
									}
									else
									{
										echo "<img src='".$foto[$contador]['tb_foto']['caminho_foto']."' height='300' width='300' style= 'padding-top:0px'> ";
							
									}
									if ($contador==sizeof($foto)-1)
									{
										echo '</br>';
									}
									$contador++;
									
								}
							}
						?>
					
					</div>
					<div align = "left" style="height: 250px; width: 800px; float: left; margin-left: 20px;">
						<?php 
							echo 'Título do anúncio: '.$dados[0]['tb_anuncio']['titulo_anuncio'];
							echo '<br /><br />Descrição do anúncio: <br /><br /><center>'.$dados[0]['tb_anuncio']['descricao_anuncio'];
							$nome_servico = $anuncioController->servicoAnuncios($dados[0]['tb_anuncio']['servico_id']);
							echo '</center><br /><br />Serviço do anúncio: '.$nome_servico[0]['tb_servico']['nome_servico'];
							echo '<br /><br />Modo de atendimento: '.$dados[0]['tb_anuncio']['modo_atendimento'];
							echo '<br /><br /><center>';
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
							echo '</center>'
						?>
					</div>
					
					<?php 
					}?>
					
					<div align = "left" style="margin: 2px; clear: both; height: 50px; width: 800px; margin-left: 100px;">
						<?php 
							
						?>
					</div>
					
					<center><h4>Comentários</h4></center>
						<div class = "panel panel-default" style="height: 500px; width: 1200px; float: left;">
							<table class="table">
				    			<tr>
				        			<th width = "50px"><center>Nome</center></th>
							        <th width = "50px"><center>Avaliação</center></th>
							        <th width = "400px"><center>Comentário</center></th>
				        		</tr>
				    			
				 
							<?php
								$contador = 0;
								while($contador<sizeof($comentarios))
								{
									$id_comentario = $comentarios[$contador]['tb_comentario']['id'];
									$texto = $comentarios[$contador]['tb_comentario']['texto_comentario'];
									$clienteComentario = $comentarioController->clienteComentario($id_comentario);
									$nome_cliente = $clienteComentario[0]['tb_pessoa']['nome_pessoa'];
									$avaliacao = $comentarioController->buscarAvaliacaoComentario($id_comentario);
									$sql = $avaliacao[0]['tb_avaliacao']['nota_avaliacao'];
							?>
							<tr>
									<td>
									 <?php echo $nome_cliente ?>
									</td>
									<td>
									<?php 
										if ($sql<=5 && $sql>4)
										{
											echo "<img src=/profinder/site/img/star_5.png>";
										}
										else if ($sql>3)
										{
											echo "<img src=/profinder/site/img/star_4.png>";
										}
										else if ($sql>2)
										{
											echo "<img src=/profinder/site/img/star_3.png>";
										}
										else if ($sql>1)
										{
											echo "<img src=/profinder/site/img/star_2.png>";
										}
										else if ($sql>0)
										{
											echo "<img src=/profinder/site/img/star_1.png>";
										}
										else 
										{
											echo "<img src=/profinder/site/img/star_0.png>";
										}
										?>
									</td>
									<td>
										<?php echo $texto; ?>
									</td>
									</tr>
								<?php 
									$contador++;
								}?>
								
								</table>
					</div>
					<?php 
					
						echo $this->Html->link(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-arrow-left')) . " Voltar",
							array('controller' => 'pages', 'action' => 'index'),
							array('role' => 'button', 'class' => 'btn btn-default', 'escape' => false)
						);	
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal View-->
<div class="modal fade" data-backdrop="static" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Dados do Bairro</h4>
      		</div>
      		<div class="modal-body">
      	
		        <?php 
		        
					echo $this->Form->create('Foto', array('action' => 'view'));
					echo $this->Form->input('legenda_foto', array('label' => 'Nome:'));
					
					$foto = $anunciosController->caminho_foto($id);
											
					if($foto==null||$foto==0)
					{
						echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='/profinder/site/img/sem-foto.jpg' height='200' width='200' style= 'padding-top:0px'> </a>";
					}
					else
					{
						echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='".$foto[0]['tb_foto']['caminho_foto']."' height='200' width='200' style= 'padding-top:0px'> </a>";
					}
					
					echo $this->Html->link(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
							array('controller' => 'anuncios','action' => 'visualizar'),
							array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
					
					echo $this->Form->end();
				 ?>
		
      		</div>
    	</div>
  	</div>
</div>
<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?sensor=SET_TO_TRUE_OR_FALSE">
    </script>
<script type="text/javascript">  
  var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 17,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
	
	var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }

  
</script>