<!DOCTYPE html>
<html>
<head>
	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
		<link rel="shortcut icon" type="image/x-icon" href="/profinder/site/profinder.ico">
	
	<?php


		//echo $this->Html->meta('icon', $this->Html->url('/favicon.png'));

	//echo $this->Html->meta('icon');

	//echo $this->Html->meta('icon');


		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('bootstrap-theme.min.css');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
	<link rel="shortcut icon" href="profinder/site/app/webroot/img/favicon.png" type="image/x-icon">
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/profinder/site/js/bootstrap.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

	<!--slider-->
	<link href="/profinder/site/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
	<script type="text/javascript" src="/profinder/site/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/profinder/site/js/jquery.nivo.slider.js"></script>

	<script type="text/javascript">
	    $(window).load(function() 
		{
	        $('#slider').nivoSlider();
	    });
	</script>
</head>
<body>
	<div class="header">	
  		<div class="wrap"> 
			<div class="header-top">
		 		<div class="logo">
			 		<center><a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style= "padding-top:0px"> </a>
		 			<br />
		 			</center>
		 		</div>
		 	</div>
		 </div>
	</div>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
	<!-- /container -->
</body>
</html>
