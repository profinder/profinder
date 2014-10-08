<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
	
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
		                		Opções LOGADO: <?php echo AuthComponent::user("id"); ?>
		                		<b class="caret"></b>
		                	</a>
							<ul class="dropdown-menu">
			               		<li><a href="/profinder/site/pages/clientePerfil">Perfil</a></li>
			               		<li><a href="/profinder/site/pages/clientePedidos">Meus pedidos</a></li>
			               		<li class="divider"></li>
								<li><a href="/profinder/site/users/delete">Remover Conta</a></li>
			               		<li><a href="/profinder/site/users/logout">Sair</a></li>

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

					
					<?php 
						$anunciosController = new AnunciosController;
						$anunciosController->constructClasses();
						$anuncios= $anunciosController->anuncios();
						

						if($anuncios == null)
						{
						$contador=0;
						$contador2=0;
						while ($contador!=sizeof($anuncios))

						{
							echo "Nenhum anúncio cadastrado!";
							echo "</br>";
							echo "</br>";
						}
						}
						else 
						{
							$contador=0;
							while ($contador!=sizeof($anuncios))
							{
								$titulo = $anuncios[$contador]['tb_anuncio']['titulo_anuncio'];
								$id = $anuncios[$contador]['tb_anuncio']['id'];
								$descricao = $anuncios[$contador]['tb_anuncio']['descricao_anuncio'];
								$modo_atendimento = $anuncios[$contador]['tb_anuncio']['modo_atendimento'];
									
								//echo $anuncio_titulo;
								//echo "<br/>";
											
							

								?>
																	
												<form action="/profinder/site/pedidos/cadastro" id="idAnuncio" method="post" accept-charset="utf-8">
													<div class="top-box">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h2 class="panel-title"><?php echo $titulo; ?></h2>
														</div>
															<div class="panel-body">
																<table border="2" width="40" height = "60">
																	<tr>
																		<td>
																			<input type="checkbox" name="anuncio[]" value=<?php echo $id ?> />
																		</td>
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
								            		<button type="submit" class="btn btn-success">Solicitar Pedido</button>
												</form>		
													
										 	</div>
										</div>
									</div>
								</div>
							</div>
														
						}
						
						<?php }  ?>
						
						

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Mensagem</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('Pedido', array('action' => 'add'));
			echo $this->Form->input('Mensagem.0.texto_mensagem', array('label' => 'Mensagem:'));
			echo $this->Form->input('Pedido.cliente_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
			echo $this->Form->input('Pedido.status_pedido', array('type' => 'hidden', 'value' => 'andamento'));
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('controller' => 'Pages','action' => 'solicitar_pedido'),
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Pedidos','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
							<?php 
							$profissional = $anunciosController->dadosProfissionalAnuncio($id);
							$nome_profissional = $profissional[$contador2]['tb_pessoa']['nome_pessoa'];
												
					?>
										
					<form action="/profinder/site/pedidos/cadastro" id="idAnuncio" method="post" accept-charset="utf-8">
						
						<div class="top-box">
							<div class="panel panel-warning">
								<div class="panel-body">
									<h4> <input type="checkbox" name="anuncio[]" value=<?php echo $id ?> /> <?php echo $titulo; ?> </h4>
									<hr>
									<br/>
									
									<div class="panel panel-default" style="height: 250px; width: 270px; float: left;">
										<?php 
											$foto = $anunciosController->caminhoFoto($id);
											if($foto==null||$foto==0){
												echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='/profinder/site/img/sem-foto.jpg' height='240' width='240' style= 'padding-top:0px'> </a>";
											}
											else
											{
												echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='".$foto[0]['tb_foto']['caminho_foto']."' height='240' width='240' style= 'padding-top:0px'> </a>";
											}
										?>
									</div>
									<div align = "left" style="height: 250px; width: 600px; float: left; margin-left: 10px;">
									 	<?php 
									 		echo "Descrição: <br /> <br /> <center>";
									 		echo $descricao;
									 		echo "</center><br /><br />";
									 		echo "Modo de atendimento: ";
									 		
									 		if($modo_atendimento == "escritorio")
									 		{
									 			echo "Escritório.";
									 			echo "<font color = '#aaacae'> Endereço ao lado (Google Maps) </font>";
									 			
									 		}
											else if($modo_atendimento == "domiciliar")
									 		{
									 			echo "Domiciliar.";
									 		}
											else if($modo_atendimento == "online")
									 		{
									 			echo "On-line.";
									 		}
									 		echo "<br /> <br />";
									 		echo "Nome do profissional: ";
									 		echo $nome_profissional;
									 		
									 	?>
									</div>
									<?php 
										if( $modo_atendimento == "escritorio")
										{
									?>
									<div class="panel panel-default" align = "left" style="height: 250px; width: 270px; float: left; margin-left: 10px;">
										<?php 
											echo "<img src='/profinder/site/img/googlemaps.png' height='250' width='270' style= 'padding-top:0px'>";
										}
										?>
									</div>
									
								</div>
							</div>
						
							</div>
						<?php 		
							$contador++;
						

						?>	
	            		<button type="submit" class="btn btn-default">Solicitar Pedido</button>
					</form>		
						
			 	</div>
			</div>
		</div>
	</div>
</div>
