<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<link rel="shortcut icon" type="image/x-icon" href="profinder.ico">
	<?php
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('bootstrap-theme.css');
		echo $this->Html->css('slider.css');
		echo $this->Html->css('style.css');
		echo $this->Html->css('swipebox.css');
		//echo $this->Html->css('fitness.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
	
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
		 <ul class="nav navbar-nav navbar-right">
		 	<br />
			<li class="dropdown">
		    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		    		<span class="glyphicon glyphicon-cog"></span>
			        Opções<b class="caret"></b></a>
					<ul class="dropdown-menu">
			        	<li>
			        	<span class='glyphicon glyphicon-user'></span>
			        	<?php
		               		 echo $this->Html->link(
		                    "Perfil",
		                    array('controller' => 'Users', 'action' => 'edit', 
		                    AuthComponent::user("id"))); 
		                   ?></li>
			            <li class="divider"></li>
			            <li><a href="/profinder/site/users/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
					</ul>
			</li>
		</ul>
		
		<div class="logo">
			<h1><a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style="padding-top:0px"></a></h1>
		</div>
		
		<div class="banner">
	    	<div class="wrap">
				<div class="cssmenu">
					
					<ul>
						<li class="dropdown">
							<a href="/profinder/site/dashboard">Home</a>
						</li>
						<li class="dropdown">
							<a href="/profinder/site/Users">Administradores</a>
						</li>
						<li class="dropdown">
							<a href="/profinder/site/Bairros">Bairros</a>
						</li>
						<li class="dropdown">
							<a href="/profinder/site/Categorias">Categorias</a>
						</li>
						<li class="dropdown">
							<a href="/profinder/site/Cidades">Cidades</a>
						</li>
						<li class="dropdown">
							<a href="/profinder/site/Servicos">Serviços</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
			 
		
	</div>
	<div id="content" style="width:95%;margin:auto;">
		<div class="container-fluid">
			<div class="row">
				<div class="row">
					<div class="col-xs-2">
						
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