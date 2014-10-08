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
								array('controller' => 'Pedidos', 'action' => 'profissionalPedidosSolicitados'),
								array('role' => 'button', 'class' => 'btn btn-warning', 'escape' => false)
							);	
						?>
						
					</div>	
				</div>
			</div>	
		</div>	
	</div>
</div>
