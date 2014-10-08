<?php echo $this->Session->flash('auth'); ?>
   
<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

	<!------ Slider ------------>
	
	<div class="header">	
  		<div class="wrap"> 
			<div class="header-top">
		 		<div class="logo">
			 		<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="80" width="387" style= "padding-top:0px"> </a>
		 		</div>
	    		
   			</div>	
		</div>
  
	<div class="banner">
    	<div class="wrap">
			<div class="cssmenu">
				
				
			</div>
			
		</div>
	</div>
  	<!------End Slider ------------>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<h2>Digite seu login e senha</h2>
						<hr>
						
			 	</div>
			 	<div class="top-box">
			 		
						<div class="users form">
							<?php echo $this->Session->flash('auth'); ?>
							<?php echo $this->Form->create('User'); ?>
							    <fieldset>
							       
							        <?php 
							        	echo $this->Form->input('username', array('label' => 'Login: '));
							       		 echo $this->Form->input('password', array('label' => 'Senha: '));
							    	?>
							    </fieldset>
							    <br /><br />
							<?php echo $this->Form->end(__('Entrar')); ?>
						
						</div>

		    	
			 	</div>
			 	
				<div class="clear"></div>
			</div>
		</div>
		
				<div class="clear"></div>
			</div>
		</div>
		
				<div class="clear"></div>
			</div>
		
</body>

</html>


    	
    	
            