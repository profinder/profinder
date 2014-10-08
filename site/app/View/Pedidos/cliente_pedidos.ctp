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
					
					<h2>Meus pedidos em andamento <a href="/profinder/site/pedidos/clientePedidosFinalizados">finalizados</a></h2>
					<?php 
						$pedidos = new PedidosController;
						$pedidos->constructClasses();
						$clientePedidos = $pedidos->clientePedidos(AuthComponent::user('id'));
						
						$contador=0;
						$contador2=0;
						while ($contador!=sizeof($clientePedidos))
						{
							$status = $clientePedidos[$contador]['tb_pedido']['status_pedido'];
							$id = $clientePedidos[$contador]['tb_pedido']['id'];
							
							$anuncioPedido = $pedidos->anuncioPedido($id);
							
							$titulo_anuncio = $anuncioPedido[$contador2]['tb_anuncio']['titulo_anuncio'];
							$descricao = $anuncioPedido[$contador2]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $anuncioPedido[$contador2]['tb_anuncio']['modo_atendimento'];
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
										<td>
											<?php
								        		echo $this->Form->postLink(
								        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Finalizar",
								        			array('controller' => 'pedidos','action' => 'clienteFinalizarPedido', $id),
								        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-default', 'escape' => false));
								        		
								        	?>
								        	<form action="/profinder/site/mensagems/clienteMensagensPedido" id = "idPedido" method = "post" accept-charset = "utf-8">
				
									        	<input type = "hidden" name = "id_pedido" value = <?php echo $id ?> />
									        	<button type = "submit" class = "btn btn-success"> Conversa </button>
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
