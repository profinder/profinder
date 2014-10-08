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
					
					<h2>Solicitações de serviço</h2>
					<?php 
						$pedidos = new PedidosController;
						$pedidos->constructClasses();
						$profissionalPedidosSolicitados = $pedidos->profissionalPedidosSolicitados(AuthComponent::user('id'));
						
						$contador=0;
						$contador2=0;
						while ($contador!=sizeof($profissionalPedidosSolicitados))
						{
							$status = $profissionalPedidosSolicitados[$contador]['tb_pedido']['status_pedido'];
							$id = $profissionalPedidosSolicitados[$contador]['tb_pedido']['id'];
							
							$pedidoAnuncio = $pedidos->anuncioPedido($id);
							
							$titulo_anuncio = $pedidoAnuncio[$contador2]['tb_anuncio']['titulo_anuncio'];
							$descricao = $pedidoAnuncio[$contador2]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $pedidoAnuncio[$contador2]['tb_anuncio']['modo_atendimento'];
							
							$dadosClientePedido = $pedidos->clienteDadosPedido($id);
							$nome_cliente = $dadosClientePedido[$contador2]['tb_pessoa']['nome_pessoa'];
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
											<li>Cliente:</li> 
												<div class="top-box">
													<div class="panel panel-default">
								        				<?php echo $nome_cliente; ?>
								        			</div>
								        		</div>
										</td>
										<td>
											<?php
								        		
								        		echo $this->Form->postLink(
									        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
									        		array('controller' => 'pedidos','action' => 'profissionalFinalizarPedido', $id),
									        		array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-default', 'escape' => false));
								        	?>
								        	<form action="/profinder/site/mensagems/profissionalMensagensPedido" id="idPedido" method="post" accept-charset="utf-8">
				
									        	<input type="hidden" name="id_pedido" value=<?php echo $id ?> />
									        	<button type="submit" class="btn btn-success">Conversa</button>
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
