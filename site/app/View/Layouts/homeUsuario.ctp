<!DOCTYPE html>
<html>
<head>
	
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
	
	<?php echo $this->Html->charset(); ?>
	<title>
		ProFinder
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('bootstrap-theme.min.css');
		echo $this->Html->css('bootstrap-theme.css');
		echo $this->Html->css('slider.css');
		echo $this->Html->css('swipebox.css');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

	<!--slider-->
	<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>

	<script type="text/javascript">
	    $(window).load(function() 
		{
	        $('#slider').nivoSlider();
	    });
	</script>
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
  		<div class="wrap"> 
			<div class="header-top">
		 		<div class="logo">
			 		<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="100" width="390" style= "padding-top:0px"> </a>
		 		</div>
	    		<div id="text-6" class="visible-all-devices header-text ">	
	     			<div class="navbar-collapse collapse">
        			
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
        			
					</div>
		 			<div class="clear"></div> 
	   			</div>
   			</div>	
		</div>
    
		<div id="content">
			
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
      <hr>
		<div class="footer">
			<div class="wrap">
				<div class="footer-text">
					<div class="copy">
						<p> © 2013 All rights Reserved | Design by <a href="http://w3layouts.com">W3Layouts</a></p>
					
						IADIHSUIFHDSIUH
					</div>
				</div>	
			</div>
		</div>

    </div> <!-- /container -->
</body>
</html>
