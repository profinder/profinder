<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
	
<div class="header">	
	<div class="wrap"> 
		<div class="header-top">
	 		<div class="logo">
		 		<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style= "padding-top:0px"> </a>
	 		</div>
    		<div id="text-6" class="visible-all-devices header-text ">	
				<div class="navbar-collapse collapse">
        				
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
        				
				</div>
		 		
		 		<div class="clear"></div> 
	   		</div>
   		</div>	
	</div>
    
	<div class="banner">
    	<div class="wrap">
			<div class="cssmenu">
				<?php
					App::import('Controller', 'Pages');
					$pages = new PagesController;
					$pages->constructClasses();
					$categorias=$pages->nomeCategorias();
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
										?>
												<li><a href="#"><?php echo $servicos[$contadorServicos]['Servico']['nome_servico'] ?></a></li>
												
												<?php
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
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<h2>Anúncios</h2>
					<hr>
						<p>Aqui você cria anúncios para seus serviços! </p>
					
					<a href="/profinder/site/anuncios/cadastro"> Criar Anúncio </a>	
			 	</div>
			</div>
		</div>
	</div>
</div>
	
	