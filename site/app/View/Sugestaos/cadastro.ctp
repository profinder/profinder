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
					<h4> Escreva uma sugestão: </h4>
							<hr><br /><br /><br /><br />
							<div align = "left" style = "margin-left: 100px">
								<li>Essa sugestão será enviada a todos os administradores.</li>
							</div>
							<br /><br />
							<?php
								echo $this->Form->create('Sugestao', array('action' => 'cadastro'));	
							?>
							<div class="panel-body">
								<?php
									echo $this->Form->input ( 'texto_sugestao', array (
										'class' => 'form-control',
										'type' => 'textarea',
										'label' => '',
										'style' => 'width:1000px; height:133px; resize:none;' 
									) );
									echo $this->Form->input('profissional_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
								?>
							</div>
							
						</div>
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
		            		
	            		?>
					</form>		
				 	
							
			 	</div>
			</div>
		</div>
	</div>
</div>