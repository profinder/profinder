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
        					{/*
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
		          						
		          				</form> */
        						echo $this->Html->link(
				        			$this->Html->tag('span', '', array('class' => '')) . "Anuncie seu serviço!",
				        			array('controller' => 'profissionals', 'action' => 'cadastro'),
									array('class' => 'btn btn-warning', 'escape' => false));
								echo "&nbsp &nbsp";
								echo $this->Html->link(
				        			$this->Html->tag('span', '', array('class' => '')) . "Contrate profissionais!",
				        			array('controller' => 'clientes', 'action' => 'cadastro'),
									array('class' => 'btn btn-info', 'escape' => false));
								echo "&nbsp &nbsp";	
          				 		echo $this->Html->link(
				        			$this->Html->tag('span', '', array('class' => '')) . "Entrar",
				        			array('controller' => 'users', 'action' => 'login'),
									array('class' => 'btn btn-success', 'escape' => false));
          					}
          					else
          					{
          						if( AuthComponent::user('role') == "cliente" )
          						{?>
          							<ul class="nav navbar-nav navbar-right">
										<li class="dropdown">
						                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							                	<span class="glyphicon glyphicon-cog"></span>
							                		<?php
													$id=AuthComponent::user('id');
													App::import('Controller', 'Pedidos');
													$pedidos = new PedidosController;
													$pedidos->constructClasses();
													$visualizado=$pedidos->pedidoNaoVisualizadoCliente($id);
													if(empty($visualizado)){
													?>
													<font color = "black"> Opções LOGADO: <?php echo AuthComponent::user('id'); ?></font> 
													<?php
													}
													else 
													{
														?>
														<font color = "black">Opções LOGADO: <?php echo AuthComponent::user('id'); ?></font> <img src = '/profinder/site/img/sino.jpg' height = '20' width = '20' style = 'padding-top:0px'>
														<?php
													}
												?><b class="caret"></b>
							            	</a>
											<ul class="dropdown-menu">
												<li><a href="/profinder/site/clientes/perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
							               		<li><a href="/profinder/site/pedidos/clientePedidos">Meus pedidos</a></li>
							               		<li class="divider"></li>
												<li onclick="remover()"><span class="glyphicon glyphicon-remove"></span> Remover Conta</li>
							               		<li><a href="/profinder/site/users/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>

						               		</ul>
										</li>
									</ul>
          						<?php }
          						else if( AuthComponent::user('role') == "profissional" )
          						{
									$id=AuthComponent::user('id');
									App::import('Controller', 'Pedidos');
									$pedidos = new PedidosController;
									$pedidos->constructClasses();
									$visualizado=$pedidos->pedidoNaoVisualizado($id);
								
								?>
          							<ul class="nav navbar-nav navbar-right">
										<li class="dropdown">
						                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						                	<span class="glyphicon glyphicon-cog"></span>
												<?php
												if(empty($visualizado)){
													?>
													Opções LOGADO: <?php echo AuthComponent::user('id'); ?> 
													<?php
												}
												else 
												{
													?>
													Opções LOGADO: <?php echo AuthComponent::user('id'); ?> <img src = '/profinder/site/img/sino.jpg' height = '20' width = '20' style = 'padding-top:0px'>
													<?php
												}
												?>
						                		<b class="caret"></b>
						                	</a>
											<ul class="dropdown-menu">
												<?php 
													echo $this->Html->link(
									        			$this->Html->tag('span', '', array()) . " Editar",
									        			array('controller' => 'profissionals', 'action' => 'editar', AuthComponent::user('id')));
												?>
							               		<li><a href="/profinder/site/anuncios/profissionalAnunciosAtivos">Meus anúncios</a></li>
							               		<li><a href="/profinder/site/pedidos/profissionalPedidosSolicitados">Solicitações</a></li>
							               		<li><a href="/profinder/site/sugestaos/cadastro">Enviar sugestão</a></li>
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
							if( $contador < 7 )
							{
					?>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $categorias[$contador]['Categoria']['nome_categoria'] ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php
									$servicos = $pages->nomeServicos($categorias[$contador]['Categoria']['id']);
									$contadorServicos=0;
									while($contadorServicos<sizeof($servicos))
									{
										if( $contadorServicos < 15 )
										{
											$id_servico = $servicos[$contadorServicos]['Servico']['id'];
											$nome_servico = $servicos[$contadorServicos]['Servico']['nome_servico']; 
											echo "<li><a href = '/profinder/site/anuncios/anuncios?pag=1&serv=".$id_servico;
											echo "'>$nome_servico</a></li>";
										}
										else
										{
											echo "<li><a href = '/profinder/site/servicos/servicos?cat=".$categorias[$contador]['Categoria']['id'];
											echo "'><span class='glyphicon glyphicon-plus'></span> Mais serviços</a></li>";
											break;
										}
										$contadorServicos++;
									}
									
								?>
							</ul>
							<?php
						
							}
							else
							{
								break;
							}
							$contador++;
					}
							?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Outros<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href = '/profinder/site/categorias/categorias'>Todas categorias</a></li>
												
						</ul>
					</li>
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

<script>

	function remover(){
		swal({   title: "Are you sure?",   text: "You will not be able to recover this imaginary file!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   cancelButtonText: "No, cancel plx!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     swal("Deleted!", "Your imaginary file has been deleted.", "success");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } });
	}
	
</script>
