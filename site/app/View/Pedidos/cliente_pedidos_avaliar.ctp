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
