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
					
					<div class="btn-group btn-group-justified">
						<?php 
							echo $this->Html->link(
			        			$this->Html->tag('span', '', array('class' => '')) . " Serviço",
			        			array('controller' => 'pedidos', 'action' => 'profissionalPedidosSolicitados'),
								array('class' => 'btn btn-success', 'escape' => false));
							echo $this->Html->link(
			        			$this->Html->tag('span', '', array('class' => '')) . " Finalizar pedido",
			        			array('controller' => 'pedidos', 'action' => 'profissionalSolicitacaoFinalizarPedido'),
								array('class' => 'btn btn-default', 'escape' => false));
						?>
					</div>
					<br />
					<?php 
						$pedidos = new PedidosController;
						$pedidos->constructClasses();
						$profissionalPedidosSolicitados = $pedidos->profissionalPedidosSolicitados(AuthComponent::user('id'));
						
						$contador=0;
						while ($contador!=sizeof($profissionalPedidosSolicitados))
						{
							$status = $profissionalPedidosSolicitados[$contador]['tb_pedido']['status_pedido'];
							$id = $profissionalPedidosSolicitados[$contador]['tb_pedido']['id'];
							
							$pedidoAnuncio = $pedidos->anuncioPedido($id);
							
							$id_anuncio = $pedidoAnuncio[0]['tb_anuncio']['id'];
							$titulo_anuncio = $pedidoAnuncio[0]['tb_anuncio']['titulo_anuncio'];
							$descricao = $pedidoAnuncio[0]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $pedidoAnuncio[0]['tb_anuncio']['modo_atendimento'];
							
							$dadosClientePedido = $pedidos->clienteDadosPedido($id);
							$nome_cliente = $dadosClientePedido[0]['tb_pessoa']['nome_pessoa'];
							$email = $dadosClientePedido[0]['tb_pessoa']['username'];
					?>
					<div class="top-box">
						<div style = "border: 1px solid GREEN; margin: 2px;" >
							<div class="panel-body">
								<div align = "left" style="height: 200px; width: 350px; float: left; margin-left: 10px;">
									<center> Dados do Anúncio: </center>
									<br /> <br />
									Título: <?php echo $titulo_anuncio; ?>
									<br /> <br /> 
									Descrição: <?php echo $descricao; ?>
									<br /> <br /> 
									Modo de atendimento: <?php echo $modo_atendimento; ?>
									<br /> <br /> 
									<?php 
										echo "<center>Para mais detalhes, clique <a href='/profinder/site/anuncios/detalhesAnuncio?id=" . $id_anuncio . "'>aqui</a></center>";
									?>
								</div>
								
								<div align="left" style="height: 202px; width: 430px; float: left; margin-left: 200px;">
									<center> Dados do Cliente: </center>
									<br /> <br />
									Nome: <?php echo $nome_cliente; ?>
									<br /> <br /> 
									E-mail: <?php echo $email; ?>
									<br /> <br /> 
									
								</div>
								<div align="right" style="height: 10px; width: 570px; float: left; margin-left: 10px;">
									
									<?php
								        		
								        		echo $this->Form->postLink(
									        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Finalizar",
									        		array('controller' => 'pedidos','action' => 'profissionalFinalizarPedido', $id),
									        		array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-default', 'escape' => false));
									?>
								    								</div>
								<div align="left" style="height: 10px; width: 570px; float: left; margin-left: 10px;">
									<form action="/profinder/site/mensagems/profissionalMensagensPedido" id="idPedido" method="post" accept-charset="utf-8">
				
									        	<input type="hidden" name="id_pedido" value=<?php echo $id ?> />
									        	<button type="submit" class="btn btn-success">Conversa</button>
								        	</form>
								</div>			
									
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
