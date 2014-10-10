<!DOCTYPE html>
<html>
<head>
	
	<?php echo $this->Html->charset(); ?>
	<title>
		ProFinder
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
			 		<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style= "padding-top:0px"> </a>
		 		</div>
	    		<div id="text-6" class="visible-all-devices header-text ">	
	     			<div class="navbar-collapse collapse">
        				
        				<?php
        					if( AuthComponent::user('id') == null )
        					{
        				?>
        				<form action="/profinder/site/users/login" id="UserLoginForm" method="post" accept-charset="utf-8"
        					class="navbar-form navbar-right" role="form">
        					<input type="hidden" name="_method" value="POST"/>
            					<div class="form-group">
              						<input name="data[User][username]" class="form-control" maxlength="50"
              							type="text" id="UserUsername" required="required" placeholder="E-mail"/>
            						
            					</div>
            					<div class="form-group">
            						<input name="data[User][password]" placeholder="Senha" type="password"
            							id="UserPassword" required="required" class="form-control"/>
            					</div>
            					<button type="submit" class="btn btn-success">Entrar</button>
            					
            					<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Esqueci minha senha</button>
          						
          				</form>
          				<?php 
          					}
          					else
          					{
          						if( AuthComponent::user('role') == "cliente" )
          						{?>
          							<ul class="nav navbar-nav navbar-right">
										<li class="dropdown">
						                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							                	<span class="glyphicon glyphicon-cog"></span>
							                		Opções LOGADO: <?php echo AuthComponent::user('id'); ?>
							                		<b class="caret"></b>
							            	</a>
											<ul class="dropdown-menu">
												<li><a href="/profinder/site/clientes/perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
							               		<li><a href="/profinder/site/pedidos/clientePedidos">Meus pedidos</a></li>
												<li><a href="/profinder/site/pedidos/clientePedidosAvaliar">Meus pedidos disponíveis para avaliar</a></li>
							               		<li><a href="/profinder/site/pedidos/clienteSolicitacaoFinalizarPedido">Solicitações de finalizar pedido</a></li>
							               		<li class="divider"></li>
												<li><a href="/profinder/site/users/delete"><span class="glyphicon glyphicon-remove"></span> Remover Conta</a></li>
							               		<li><a href="/profinder/site/users/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>

						               		</ul>
										</li>
									</ul>
          						<?php }
          						else if( AuthComponent::user('role') == "profissional" )
          						{?>
          							<ul class="nav navbar-nav navbar-right">
										<li class="dropdown">
						                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						                	<span class="glyphicon glyphicon-cog"></span>
						                		Opções LOGADO: <?php echo AuthComponent::user('id'); ?>
						                		<b class="caret"></b>
						                	</a>
											<ul class="dropdown-menu">
							               		<li><a href="/profinder/site/profissionals/perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
							               		<li><a href="/profinder/site/anuncios/profissionalAnuncios">Meus anúncios</a></li>
							               		<li><a href="/profinder/site/pedidos/profissionalPedidosSolicitados">Solicitações de serviço</a></li>
							               		<li><a href="/profinder/site/pedidos/profissionalSolicitacaoFinalizarPedido">Solicitações de finalizar pedido</a></li>
							               		<li class="divider"></li>
												<li>
													<?php
							               		 		echo $this->Form->postLink(
											        		$this->Html->tag('span', '', array()) . "<span class='glyphicon glyphicon-remove'></span> Remover Conta",
											        		array('controller' => 'users','action' => 'delete', AuthComponent::user("id")),
											        		array('confirm' => 'Tem certeza?', 'escape' => false));
							                	 	?>
												</li>
							               		<li><a href="/profinder/site/users/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
						               		</ul>
										</li>
									</ul>
          						<?php }
          						else
          						{?>
									<ul class="nav navbar-nav navbar-right">
									 	<li class="dropdown">
									    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									    		<span class="glyphicon glyphicon-cog"></span>
										        Opções<b class="caret"></b></a>
												<ul class="dropdown-menu">
										        	<li> 
											        	<?php
										               		 echo $this->Html->link(
										                    "<span class='glyphicon glyphicon-user'></span> Perfil",
										                    array('controller' => 'Users', 'action' => 'edit', 
										                    AuthComponent::user("id"))); 
										                 ?>
									                 </li>
									                 <li>
										        	
										        		<?php
									               		 	echo $this->Form->postLink(
												        		$this->Html->tag('span', '', array()) . "<span class='glyphicon glyphicon-remove'></span> Remover Conta",
												        		array('controller' => 'users','action' => 'delete', AuthComponent::user("id")),
												        		array('confirm' => 'Tem certeza?', 'escape' => false));
									                	 ?>
									                </li>
										            <li class="divider"></li>
										            <li><a href="/profinder/site/users/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
												</ul>
										</li>
									</ul>
          						<?php }
          					}
          				?>
			
	    				<br/>
	    				
	    				</div>
		 			<div class="clear"></div> 
	   			</div>
   			</div>	
		</div>
	</div>
	
	<form id = "formulario" action = "anuncios/anuncios" method = "post">
	<div class="banner">
    	<div class="wrap">
			<div class="cssmenu">
				
				<?php
					App::import('Controller', 'Pages');
					$pages = new PagesController;
					$pages->constructClasses();
					$categorias=$pages->nomeCategorias();
					//$pages->email('uuu');
					$contador=0;
				?>
				<ul>
				
					<?php
						while($contador<sizeof($categorias))
						{
					?>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $categorias[$contador]['Categoria']['nome_categoria'] ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php
									$servicos=$pages->nomeServicos($categorias[$contador]['Categoria']['id']);
									$contadorServicos=0;
									while($contadorServicos<sizeof($servicos))
									{
										$id_servico = $servicos[$contadorServicos]['Servico']['id'];
										$nome_servico = $servicos[$contadorServicos]['Servico']['nome_servico']; 
								/*<li><a href = "/profinder/site/anuncios/anuncios?serv=".<?php echo $id_servico;?>><?php echo $servicos[$contadorServicos]['Servico']['nome_servico']; ?></a></li>
								*/
								echo "<li><a href = '/profinder/site/anuncios/anuncios?serv=".$id_servico;
								echo "'>$nome_servico</a></li>";
								
								/*echo "<a href = '/Loja/clienteForm.php?usr=".$row['id_cliente'];
								echo "'>Editar</a> ";
				
								<?php*/
									$contadorServicos++;
						}
					?>
							</ul>
							<?php
						$contador++;
					}
							?>
					<div class="clear"></div> 
				</ul>
			</div>
		</div>
	</div>	
	</form>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		 
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
