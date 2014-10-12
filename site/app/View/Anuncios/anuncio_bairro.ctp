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
					<div class="panel panel-default">
								<div class="panel-body">
								<?php
									App::import('Controller', 'Cidades');
				
									$cidades = new CidadesController;
									$cidades->constructClasses();
									$estados=$cidades->estados();	
									$servico=$_GET["serv"]
								?>
									<form name="formBairros" action="/profinder/site/anuncios/anuncioBairro?serv=<?php echo $servico; ?>" method="post">
										<select name="estado" id="estado">
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
										<select id="cidadesSelect" name="cidadesSelect">
											<option>Cidade</option>
										</select>
										<select id="bairros" name="bairros">
											<option>Bairro</option>
										</select>
									<?php 
									echo $this->Form->button(
										$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search'))."",
										array('type' => 'submit', 'class' => 'btn btn-default', 'escape' => false)
									);
								?>
						</form>
					</div>
					</div>
					
				</div>
				<div class="top-box">	
				
					<?php
					$anunciosController = new AnunciosController ();
					$anunciosController->constructClasses ();
					if($_POST['bairros']==null)
					{
						$anuncios = $anunciosController->anuncios ();
					}
					else{
						$anuncios = $anunciosController->anunciosBairro($_POST['bairros']);
					}
					
					
					if ($anuncios == null) {
						echo "Nenhum Anúncio cadastrado!";
						echo "</br>";
						echo "</br>";
						echo "</br>";
						echo "</br>";
					} else {
						$contador = 0;
						$contador2 = 0;
						
						while ( $contador != sizeof ( $anuncios ) ) {
							$titulo = $anuncios [$contador] ['tb_anuncio'] ['titulo_anuncio'];
							$id = $anuncios [$contador] ['tb_anuncio'] ['id'];
							$descricao = $anuncios [$contador] ['tb_anuncio'] ['descricao_anuncio'];
							$modo_atendimento = $anuncios [$contador] ['tb_anuncio'] ['modo_atendimento'];
							
							$profissional = $anunciosController->dadosProfissionalAnuncio ( $id );
							$nome_profissional = $profissional [$contador2] ['tb_pessoa'] ['nome_pessoa'];
							?>
										
					<form action="/profinder/site/pedidos/cadastro" id="idAnuncio"
						method="post" accept-charset="utf-8">
						<div class="top-box">
							<div class="panel panel-warning">
								<div class="panel-body">
									<h4>
										<input type="checkbox" name="anuncio[]"
											value=<?php echo $id ?> /> <?php echo $titulo; ?> </h4>
									<hr>
									<br />

									<div class="panel panel-default"
										style="height: 202px; width: 202x; float: left;">
										<?php
							$foto = $anunciosController->caminho_foto ( $id );
							
							if ($foto == null || $foto == 0) {
								echo "<a href='/profinder/site/anuncios/detalhesAnuncio?id=" . $id . "'><img src='/profinder/site/img/sem-foto.jpg' height='200' width='200' style= 'padding-top:0px'> </a>";
							} else {
								echo "<a href='/profinder/site/anuncios/detalhesAnuncio?id=" . $id . "'><img src='" . $foto [0] ['tb_foto'] ['caminho_foto'] . "' height='200' width='200' style= 'padding-top:0px'> </a>";
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
							echo "Nome do profissional: ";
							echo $nome_profissional;
							?>
									</div>
									<?php
							if ($modo_atendimento == "escritorio") {
								?>
									
									<div class="panel panel-default" align="left"
										style="height: 202px; width: 202px; float: left; margin-left: 10px;">
										<?php
								echo "<img src = '/profinder/site/img/googlemaps.png' height = '200' width = '200' style = 'padding-top:0px'>";
							}
							?>
									</div>
								</div>
							</div>
						</div>
						<?php 		
							$contador++;
						}

						if( AuthComponent::user('role') == "cliente" )
						{?>
	            			<center><button type = "submit" class="btn btn-default">Solicitar Pedido</button></center>
	            		<?php }?>
					</form>			
			 	</div>
						
			</div>
		</div>
	</div>
</div>
<?php
	}
?>

<script>
	$(function(){
		$("#estado").change(function(){
		var estado = $(this).val();
		alert(estado)
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

								

								
						
