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
					
					<h2><a href="/profinder/site/pedidos/clientePedidos">ANDAMENTO </a>FINALIZADOS</h2>
					<br />
					<?php 
						$pedidos = new PedidosController;
						$pedidos->constructClasses();
						$pedidosClienteFinalizados = $pedidos->clientePedidosFinalizados(AuthComponent::user('id'));
						
						$contador=0;
						$contador2=0;
						while ($contador!=sizeof($pedidosClienteFinalizados))
						{
							$status = $pedidosClienteFinalizados[$contador]['tb_pedido']['status_pedido'];
							$id = $pedidosClienteFinalizados[$contador]['tb_pedido']['id'];
							
							$pedidoAnuncio = $pedidos->anuncioPedido($id);
							
							$titulo_anuncio = $pedidoAnuncio[$contador2]['tb_anuncio']['titulo_anuncio'];
							$descricao = $pedidoAnuncio[$contador2]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $pedidoAnuncio[$contador2]['tb_anuncio']['modo_atendimento'];
					?>
					<div class="top-box">
						<div class="panel panel-warning">
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
