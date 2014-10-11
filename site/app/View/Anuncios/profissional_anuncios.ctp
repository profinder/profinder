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
					<div class="top-box">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title"><?php echo $titulo; ?></h2>
							</div>
							<div class="panel-body">
								<table border="2" width="40" height = "60">
									<tr>
										<td>
											<li>Descrição:</li> 
												<div class="top-box">
													<div class="panel panel-default">
								        				<?php echo $descricao; ?>
								        			</div>
								        		</div>
										</td>
									</tr>
									<tr>
										<td>
											<li>Modo de Atendimento:</li> 
												<div class="top-box">
													<div class="panel panel-default">
								        				<?php echo $modo_atendimento; ?>
								        			</div>
								        		</div>
										</td>
										<td>
											<?php
												echo $this->Html->link(
								        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . " Editar",
								        			array('controller' => 'anuncios', 'action' => 'editar', $id, 'role' => 'button'),
													array('class' => 'btn btn-default', 'escape' => false)); 
											?>
								        	<?php
								        		echo $this->Form->postLink(
								        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
								        			array('controller' => 'anuncios', 'action' => 'remover', $id),
								        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-default', 'escape' => false));
								        	?>
										</td>
									</tr>
								</table>
							</div>
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
	
	