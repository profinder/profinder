<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				
				<div style="background:url(/profinder/site/app/webroot/img/background.png) bottom no-repeat; height: 700px; width: 1600px; margin-left: -200px; margin-top:-100px;">
					<div style="height: 100px; width: 100px; float: left; height: 100px; width: 900px; margin-top: 100px; margin-left: 350px;">
							
							<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Novo Profissional</h2>
					</div>
					
					<div class="panel-body">
						<?php
							echo $this->Form->create('Profissional', array('action' => 'cadastro'));	
						?>					
					</div>
				</div>
			</div>
		<?php 
			
			echo "<center>";
			echo $this->Form->button(
				$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar",
				array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
			);
			echo " ";
			echo $this->Html->link(
				$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-arrow-left')) . " Cancelar",
				array('controller' => 'pages', 'action' => 'index'),
				array('role' => 'button', 'class' => 'btn btn-warning', 'escape' => false)
			);	
			echo " ";
			
			echo "</center>";
			echo $this->Form->end();
			
		?>
					 	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



