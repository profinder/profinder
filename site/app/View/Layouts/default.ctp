<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title>
		<?php echo $title_for_layout; ?>
	</title>
<link rel="shortcut icon" type="image/x-icon" href="profinder.ico">
	<?php
		//echo $this->Html->meta('profinder_icon.ico');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('bootstrap-theme.css');
		echo $this->Html->css('slider.css');
		echo $this->Html->css('styleAdmin.css');
		echo $this->Html->css('swipebox.css');
		//echo $this->Html->css('fitness.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<script src="js/jquery_min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
	  	$(function() {
		    $( "#dialog" ).dialog({
		      autoOpen: false,
		      show: {
		        effect: "blind",
		        duration: 1000
		      },
		      hide: {
		        effect: "explode",
		        duration: 1000
		      }
		    });
		 
		    $( "#opener" ).click(function() {
		      $( "#dialog" ).dialog( "open" );
		    });
	  	});
 	</script>
</head>

<body>
	<div class="header">
		<div class="logo">
			<h1><a href="/profinder/site"><img src="img/logo1.png" height="70" width="338" style="padding-top:0px"></a></h1>
		</div>
			 
		<div class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
		        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		            </button>
				</div>
		        <div class="navbar-collapse collapse">
		        	<ul class="nav navbar-nav">
			            <li><a href="/profinder/site/Dashboard">Home</a></li>
			            <li><a href="/profinder/site/Bairros">Bairro</a></li>
			            <li><a href="/profinder/site/Categorias">Categorias</a></li>
			            <li><a href="/profinder/site/Cidades">Cidades</a></li>
			            <li><a href="/profinder/site/Users">Administradores</a></li>
			            <li><a href="/profinder/site/Servicos">Serviços</a></li>
			        </ul>
		            <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
		                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                		Opções
		                		<b class="caret"></b>
		                	</a>
							<ul class="dropdown-menu">
			                	<li><a href="#">Perfil</a></li>
			                  	<li><a href="#">Notificações</a></li>
			                  	<li class="divider"></li>
			                  	<li><a href="/profinder/site/users/logout">Sair</a></li>
		                	</ul>
						</li>
					</ul>
					
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</div>
	</div>
	<div id="content" style="width:95%;margin:auto;">
		<div class="container-fluid">
			<div class="row">
				<div class="row">
					<div class="col-xs-2">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Ol� <?php echo AuthComponent::user('nome_pessoa'); ?>!</h3>
							</div>
							<div class="panel-body">
							    <div>
								</div>
						    </div>
						</div>
					</div>
					<div class="col-xs-10">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<p>&copy; Company 2014</p>
	</div>
</body>
</html>