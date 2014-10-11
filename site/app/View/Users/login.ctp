<?php echo $this->Session->flash('auth'); ?>
   
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
					<font color = "#8F6442" size = "5px"> Conecte-se à sua conta ProFinder</font>
			 	</div>
			 	<div class="top-box">
						<div class="users form">
							<?php echo $this->Session->flash('auth'); ?>
							<?php echo $this->Form->create('User'); ?>
							
							<div align="center" style="height: 202x; width: 700px; float: left; margin-left: 250px;">
						
								<br />
								<?php 
									echo $this->Form->input('username', array (
										'type' => 'text',
										'label' => '',
										'style' => 'width:300px; height:30px; resize:none;',
										'placeholder' => ' email@email.com', 
										'type' => 'email' 
									));
								?>	
								<br />
								<?php 
									echo $this->Form->input('password', array (
										'label' => '',
										'style' => 'width:300px; height:30px; resize:none;',
										'placeholder' => ' Senha'
									));
								?>	
								<br /> <br />
								<?php 
									echo $this->Form->button(
										$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok-sign'))." Login",
										array('type' => 'submit', 'class' => 'btn btn-default', 'escape' => false));
									echo $this->Form->end();
								?>
								
								<br /> <br />
								
								<button class="btn btn-default data-toggle="modal" data-target="#myModal">Esqueci minha senha</button>
		          						
								<br /><br />
								
							</div>
							  
							    <br /><br />
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

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Usuário</h4>
      </div>
      <div class="modal-body">
      	
        	<form id = "formEmail" action = "/profinder/site/clientes/enviar_email" method = "post">
			<input type='text' name='username'>
				
			<button type="submit" class="btn btn-default">Solicitar Senha</button>
			</form>
      </div>
    </div>
  </div>
</div>


    	
    	
            