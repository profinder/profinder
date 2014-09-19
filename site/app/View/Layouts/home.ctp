<!DOCTYPE html>
<html>
<head>
	
	<?php echo $this->Html->charset(); ?>
	<title>
		ProFinder
	</title>
		<link rel="shortcut icon" type="image/x-icon" href="profinder.ico">
	
	<?php

	//echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('bootstrap-theme.min.css');
		
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
    <script src="/profinder/site/js/bootstrap.js"></script>
    
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
</head>
<body>
		<div id="content">
			
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
      <hr>
		<div class="footer">
			<div class="wrap">
				<div class="footer-text">
					<div class="copy">
						<p> © 2014 ProFinder</p>
					</div>
				</div>	
			</div>
		</div>

     <!-- /container -->
</body>
</html>
