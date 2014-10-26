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
					<?php
						$mensagem = new MensagemsController;
						$mensagem->constructClasses();
						if($_POST["id_pedido"]!=null)
						{
							$id_pedido=$_POST["id_pedido"];
							$mensagem->sessaoPedido($id_pedido);
						}
						else 
						{
							$id_pedido=$this->Session->read('sessaoPedido');
						}
									
						$mensagensPedido = $mensagem->clienteMensagensPedido($id_pedido);
						App::import('Controller', 'Pedidos');
						$pedidoController = new PedidosController;
						$pedidoController->constructClasses();
						$profissional = $pedidoController->dadosProfissional($id_pedido);
						//var_dump($cliente);
						$nome_profissional = $profissional[0]['tb_pessoa']['nome_pessoa'];
					?>
					<h2>Mensagens com <?php echo $nome_profissional;?></h2>
					<div class="top-box">
						<div class="panel panel-default">
							<div class="panel-body" style = "height: 400px; overflow: auto;">
								<?php 
									$contador=0;
									$contador2=0;
									while ($contador!=sizeof($mensagensPedido))
									{
										$id = $mensagensPedido[$contador]['tb_mensagem']['id'];
										$texto = $mensagensPedido[$contador]['tb_mensagem']['texto_mensagem'];
										$quem_enviou = $mensagensPedido[$contador]['tb_mensagem']['quem_enviou'];
										
										
										
										if( $quem_enviou == "cliente" )
										{		
								?>
											<div class = "panel panel-success" style = "width: 700px; clear:both; margin-left: 450px;">
											 	<div class="panel-heading"><?php echo $texto; ?></div>
											</div>
											<?php 
										}
										else 
										{
											?>
											<div class = "panel panel-default" style = "width: 700px; clear:both;">
												<div class="panel-heading"><?php echo $texto; ?></div>
											</div>
											<?php 
										}
										$contador2++;
										$contador++;
									}
								?>
								
							</div>
						</div>
						<?php 
							echo $this->Form->create('Mensagem', array('action' => 'add'));
							echo $this->Form->input('pedido_id', array('type' => 'hidden', 'value' => $id_pedido)); 
							echo $this->Form->input('Mensagem.quem_enviou', array('type' => 'hidden', 'value' => 'cliente'));
							echo "<br />";
						?>
						<div style="height: 100px; width: 1115px; float: left;">
							<?php 
								echo $this->Form->input('Mensagem.texto_mensagem', array (
									'class' => 'form-control',
									'type' => 'textarea',
									'label' => '',
									'style' => 'width:1120px; height:100px; resize:none;', 
									'placeHolder' => "Digite aqui sua resposta..."
								) );
							?>
						</div>
						<div style="height: 100px; width: 70px; float: left; margin-left: 13px; margin-top: 20px;">
							<?php 
								echo $this->Form->button ( $this->Html->tag ( 'span', '', array (
										'class' => 'glyphicon glyphicon-arrow-up' 
								) ) . "<br /><br /> Enviar <br /><br />", array (
										'type' => 'submit',
										'class' => 'btn btn-success',
										'escape' => false 
								) );
							?>
						</div>
						<br />
						
						<?php 
							echo $this->Form->button ( $this->Html->tag ( 'span', '', array (
									'class' => 'glyphicon glyphicon-pencil' 
							) ) . " Limpar", array (
									'type' => 'reset',
									'class' => 'btn btn-info',
									'escape' => false 
							) );
							echo "  ";
							echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-arrow-left')) . " Voltar",
								array('controller' => 'Pedidos', 'action' => 'clientePedidos'),
								array('role' => 'button', 'class' => 'btn btn-warning', 'escape' => false)
							);	
						?>
						
					</div>	
				</div>
			</div>	
		</div>	
	</div>
</div>
