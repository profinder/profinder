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
					
					<h2>Pedidos para avaliar</a></h2>
					<?php 
						$pedidos = new PedidosController;
						$pedidos->constructClasses();
						$clientePedidoAvaliar = $pedidos->clientePedidosAvaliar(AuthComponent::user('id'));
						
						$contador=0;
						$contador2=0;
						while ($contador!=sizeof($clientePedidoAvaliar))
						{
							$status = $clientePedidoAvaliar[$contador]['tb_pedido']['status_pedido'];
							$id = $clientePedidoAvaliar[$contador]['tb_pedido']['id'];
							
							$pedidoAnuncio = $pedidos->anuncioPedido($id);
							
							$titulo_anuncio = $pedidoAnuncio[$contador2]['tb_anuncio']['titulo_anuncio'];
							$descricao = $pedidoAnuncio[$contador2]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $pedidoAnuncio[$contador2]['tb_anuncio']['modo_atendimento'];
					?>
					<div class="top-box">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title"><?php echo $id; ?></h2>
							</div>
							<div class="panel-body">
								<table border="2" width="40" height = "60">
									<tr>
										<td>
											<li>Descrição:</li> 
												<div class="top-box">
													<div class="panel panel-default">
								        				<?php echo $status; ?>
								        			</div>
								        		</div>
										</td>
									</tr>
									<tr>
										<td>
											<li>Modo de Atendimento:</li> 
												<div class="top-box">
													<div class="panel panel-default">
								        				<?php echo $modo_atendimento; ?>
								        			</div>
								        		</div>
										</td>
									</tr>
									<tr>
										<td>
											<form action = "/profinder/site/avaliacaos/avaliarPedido" id = "idPedido" method = "post" accept-charset = "utf-8">
				
									        	<input type = "hidden" name = "id_pedido" value = <?php echo $id ?> />
									        	<button type = "submit" class = "btn btn-success">Avaliar</button>
								        	
								        	</form>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					
					<?php 		
							
							$contador++;
						}
					?>
													
					
			 	</div>
			</div>
		</div>
	</div>
</div>