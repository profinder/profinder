<link rel="stylesheet" href="css/bootstrap.css"/>
<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />

<div class="header">
	<div class="wrap">
		<div class="header-top">
			<div class="logo">
				<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style="padding-top: 0px"> </a>
			</div>
		</div>
	</div>
</div>
<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				<div class="panel panel-default">
					<div class="panel-heading">
					
						<h2 class="panel-title">Novo Anúncio</h2>
					</div>
					
					<div class="panel-body">
						<?php
							echo $this->Form->create('Foto', array('action' => 'cadastro', 'type' => 'file'));	
						?>
						<table height = "200">
							<tr>
								<td>
									<div class="top-box">
										<div class="panel panel-default">
											
											<div class="panel-body">
											<center>
												<table border="1" width="1120" height = "500">
													
														<?php echo $this->Form->input('legenda_foto', array('type' => 'file'));
																echo $this->Form->input('caminho_foto');
														?>
														</td>
													</tr>
												</table>	
											</center>		
											</div>
										</div>
									</div>
							
								</td>
									</tr>
													

						</table>
						
					<?php 
					
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar",
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
						echo $this->Form->end();
						
						
					?>
					
				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
		