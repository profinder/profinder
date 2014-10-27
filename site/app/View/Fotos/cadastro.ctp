<link rel="stylesheet" href="css/bootstrap.css"/>
<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />


<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				<div class="panel panel-default">
					<div class="panel-heading">
					
						<h2 class="panel-title">Novo Anúncio </h2>
					</div>
					
					<div class="panel-body">
					
						<?php
						
							echo $this->Form->create('Foto', array('action' => 'cadastro', 'type' => 'file'));
							App::import('Controller', 'Anuncios');
							$anuncio = new AnunciosController;
							$anuncio->constructClasses();
							$idAnuncio=$this->Session->read('idAnuncio');
							$fotos=$anuncio->caminho_foto($idAnuncio);
							
						?>
						
						
								
									<?php
									$contador=0;
									while ( $contador != sizeof ( $fotos ) )
									{
										?>
										<div class="top-box">
											<div class="panel panel-warning">
												<div class="panel-body">
												<?php
													echo "<img src='" . $fotos [$contador] ['tb_foto'] ['caminho_foto'] . "' height='150' width='150' style= 'padding-top:0px'> </a>";
													$contador++;
												?>
												</div>
											</div>
										</div>
										<?php
									}
								echo $this->Form->input('legenda_foto', array('type' => 'file', 'label' => 'Insira algumas fotos do seu serviço'));
							
					
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Enviar",
								array('type' => 'submit', 'class' => 'btn btn-default', 'escape' => false)
						);
						echo " ";
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
								array('controller' => 'Users','action' => 'index'),
								array('role' => 'button', 'class' => 'btn btn-default', 'escape' => false)
						);	
						echo " ";
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil'))." Limpar",
								array('type' => 'reset', 'class' => 'btn btn-default', 'escape' => false)
						);			
						echo "<br /> <br />";
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok')) . " Finalizar",
								array('controller' => 'Anuncios', 'action' => 'profissionalAnuncios'),
								array('role' => 'button', 'class' => 'btn btn-success', 'escape' => false)
						);	
						echo $this->Form->end();
					?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
		