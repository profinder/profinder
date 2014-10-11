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
			        			$this->Html->tag('span', '', array('class' => '')) . " Andamento",
			        			array('controller' => 'pedidos', 'action' => 'clientePedidos'),
								array('class' => 'btn btn-success', 'escape' => false));
							echo $this->Html->link(
			        			$this->Html->tag('span', '', array('class' => '')) . " Finalizado",
			        			array('controller' => 'pedidos', 'action' => 'clientePedidosFinalizados'),
								array('class' => 'btn btn-default', 'escape' => false));
							echo $this->Html->link(
			        			$this->Html->tag('span', '', array('class' => '')) . " Disponível avaliação",
			        			array('controller' => 'pedidos', 'action' => 'clientePedidosAvaliar'),
								array('class' => 'btn btn-info', 'escape' => false));		
							echo $this->Html->link(
			        			$this->Html->tag('span', '', array('class' => '')) . " Solicitação de finalização",
			        			array('controller' => 'pedidos', 'action' => 'clienteSolicitacaoFinalizarPedido'),
								array('class' => 'btn btn-danger', 'escape' => false));	
						?>
					</div>
					
					<br />
					
					<?php 
						$pedidos = new PedidosController;
						$pedidos->constructClasses();
						$clientePedidosAvaliar = $pedidos->clientePedidosAvaliar(AuthComponent::user('id'));
						
						$contador=0;
						$contador2=0;
						while ($contador!=sizeof($clientePedidosAvaliar))
						{
							$status = $clientePedidosAvaliar[$contador]['tb_pedido']['status_pedido'];
							$id = $clientePedidosAvaliar[$contador]['tb_pedido']['id'];
							
							$anuncioPedido = $pedidos->anuncioPedido($id);
							
							$id_anuncio = $anuncioPedido[$contador2]['tb_anuncio']['id'];
							$titulo_anuncio = $anuncioPedido[$contador2]['tb_anuncio']['titulo_anuncio'];
							$descricao = $anuncioPedido[$contador2]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $anuncioPedido[$contador2]['tb_anuncio']['modo_atendimento'];
							
							$profissional = $pedidos->dadosProfissional($id);
							
							$nome_profissional = $profissional[$contador2]['tb_pessoa']['nome_pessoa'];
							$email_profissional = $profissional[$contador2]['tb_pessoa']['username'];
					?>
					<div class="top-box">
						<div class="panel panel-info">
							<div class="panel-body">
								<div align = "left" style="height: 200px; width: 350px; float: left; margin-left: 10px;">
									<center> Dados do Pedido: </center>
									<br /> <br />
									Status: <?php echo $status; ?>
									<br /> <br /> 
								</div>
								<div align="left" style="height: 202px; width: 430px; float: left; margin-left: 10px;">
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
								<div align="left" style="height: 202px; width: 350px; float: left; margin-left: 10px;">
									<center> Dados do Profissional: </center>
									<br /> <br />
									Nome: <?php echo $nome_profissional; ?>
									<br /> <br /> 
									E-mail: <?php echo $email_profissional; ?>
									<br /> <br />
								</div>
								<div align="right" style="height: 10px; width: 570px; float: left; margin-left: 10px;">
									<form action="/profinder/site/mensagems/clienteMensagensPedido" id = "idPedido" method = "post" accept-charset = "utf-8">
										<input type = "hidden" name = "id_pedido" value = <?php echo $id ?> />
									    <button type = "submit" class = "btn btn-default"> Conversa </button>
								    </form>
								
								</div>
								<div align="left" style="height: 10px; width: 570px; float: left; margin-left: 10px;">
									<form action = "/profinder/site/avaliacaos/avaliarPedido" id = "idPedido" method = "post" accept-charset = "utf-8">
										<input type = "hidden" name = "id_pedido" value = <?php echo $id ?> />
									    <button type = "submit" class = "btn btn-default">Avaliar</button>
								        	
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
</body>
</html>