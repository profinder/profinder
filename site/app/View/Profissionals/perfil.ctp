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
					<h2>Perfil</h2>
					<?php  
						$id = AuthComponent::user('id');
						App::import('Controller', 'Profissionals');
						$profissional = new ProfissionalsController;
						$profissional->constructClasses();
						$sql = $profissional->dadosProfissional($id);
						
						//var_dump($sql[0]['tb_pessoa']);
						
						echo "Nome: ".$sql[0]['tb_pessoa']['nome_pessoa']."</br>";
						echo "E-mail: ".$sql[0]['tb_pessoa']['username']."</br>";
						echo $this->Html->link(
	        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . " Editar",
	        			array('controller' => 'profissionals', 'action' => 'editar', AuthComponent::user('id'), 'role' => 'button'),
						array('class' => 'btn btn-default', 'escape' => false));
					?>
					
			 	</div>
			</div>
		</div>
	</div>
</div>