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
									<?php echo $titulo; ?> </h4>
									<hr>
									<br />

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
										<?php
								echo "<img src = '/profinder/site/img/googlemaps.png' height = '152' width = '152' style = 'padding-top:0px'>";
							}
							?>
									</div>
								</div>
					
					<?php 		
							$contador++;
						}
					?>
						</div>							
					</div>
			 	</div>
			</div>
		</div>

<div class="modal fade" id="myModalAnuncio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Bairro</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('Anuncio', array('action' => 'add'));
			echo $this->Form->input('titulo_anuncio', array('label' => 'Titulo:'));
			$anuncios = new AnunciosController;
						$anuncios->constructClasses();
						$servicos=$anuncios->nomeServico();
						$contador=0;
						$options= array();
						
						while($contador<sizeof($servicos))
						{
							array_push($options, array($servicos[$contador]['Servico']['id'] => $servicos[$contador]['Servico']['nome_servico']));
							$contador++;
						}
						echo "Serviço: ";
						echo $this->Form->select('id_servico', $options);
					
						echo $this->Form->input('modo_atendimento', array('label' => 'Modo de atendimento: ', 'options' => array(
							'online' => 'On-line',
							'domiciliar' => 'Domiciliar',
							'escritorio' => 'Escritório',))
						);
						
						echo $this->Form->input('profissional_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
						
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Bairros','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
</div>
	
	