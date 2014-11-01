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
					<font size = "4"> Escreva uma sugestão para os administradores do ProFinder. </font>
					<br/><br/><hr><br /><br /><br /><br />
							<br /><br />
							<?php
								echo $this->Form->create('Sugestao', array('action' => 'cadastro'));	
							?>
							<center>
							<div class="panel-body">
								<?php
									echo $this->Form->input ( 'texto_sugestao', array (
										'class' => 'form-control',
										'type' => 'textarea',
										'label' => '',
										'style' => 'width:1000px; height:133px; resize:none;',
										'placeholder' => 'Olá administrador, gostaria que criasse uma nova categoria, pois...' 
									) );
									echo $this->Form->input('profissional_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
								?>
							</div>
							</center>
							<div style="margin-left: 842px;">
								<font color = "#b8b8b8">Máximo 400 caracteres.</font>
							</div>
						</div>
						<div style="margin-left: 100px;">
	            		<?php 
		            		echo $this->Form->button(
									$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar",
									array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
							);
							echo " ";
							echo $this->Html->link(
									$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
									array('controller' => 'Profissionals','action' => 'anunciosProfissional'),
									array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
							);	
							echo " ";
							echo $this->Form->button(
									$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil'))." Limpar",
									array('type' => 'reset', 'class' => 'btn btn-info', 'escape' => false)
							);			
		            		
	            		?>
	            		</div>
					</form>				
			 	</div>
			</div>
		</div>
	</div>
</div>