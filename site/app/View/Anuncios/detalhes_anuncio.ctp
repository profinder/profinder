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
						{?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $categorias[$contador]['Categoria']['nome_categoria'] ?><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<?php
											$servicos=$pages->nomeServicos($categorias[$contador]['Categoria']['id']);
											$contadorServicos=0;
											while($contadorServicos<sizeof($servicos))
											{?>
												<li><a href="#"><?php echo $servicos[$contadorServicos]['Servico']['nome_servico'] ?></a></li>
												
											<?php
												$contadorServicos++;
											}?>
									</ul>
							<?php
							$contador++;
						}?>
											
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
						$id = $_GET['id'];
						$anunciosController = new AnunciosController;
						$anunciosController->constructClasses();
						$foto = $anunciosController->caminho_foto($id);
						
						App::import('Controller', 'Avaliacaos');
						$avalicaoController = new AvaliacaosController;
						$avalicaoController->constructClasses();
						$sqlavaliacao = $avalicaoController->buscarAvaliacao($id);
						$quantidadeAvaliacoes = $avalicaoController->quantidadeAvaliacao($id);
						$sql = ($sqlavaliacao[0][0]['sum(tb_avaliacao.nota_avaliacao)'])/$quantidadeAvaliacoes[0][0]['count(tb_avaliacao.nota_avaliacao)'];
												
						App::import('Controller', 'Anuncios');
						$anuncioController = new AnunciosController;
						$anuncioController->constructClasses();
						$dados = $anuncioController->dadosAnuncios($id);	
						
						App::import('Controller', 'Comentarios');
						$comentarioController = new ComentariosController;
						$comentarioController->constructClasses();
						$comentarios = $comentarioController->comentariosAvaliacao($id);	
						var_dump($comentarios);
					?>	
					<h4> Dados do Anúncio </h4><br />
					
					<?php if ($dados[0]['tb_anuncio']['modo_atendimento'] == "escritorio")
					{?>
						<div style="height: 300px; width: 300px; float: left;">
							<?php 
								if($foto==null||$foto==0)
								{
									echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='/profinder/site/img/sem-foto.jpg' height='300' width='300' style= 'padding-top:0px'> </a>";
								}
								else
								{
									$contador=0;
									while ($contador<sizeof($foto))
									{
										if ($contador==0)
										{
											echo "<img src='".$foto[0]['tb_foto']['caminho_foto']."' height='300' width='300'  style= 'padding-top:0px'></br> ";
											
										}
										else
										{
											echo "<img src='".$foto[$contador]['tb_foto']['caminho_foto']."' height='300' width='300' style= 'padding-top:0px'> ";										
										}
										if ($contador==sizeof($foto)-1)
										{
											echo '</br>';
										}
										$contador++;
									}
								}
							?>
						</div>
						<div align = "left" style="margin: 2px; height: 250px; width: 550px; float: left; margin-left: 20px;">
							<?php 
								echo 'Título do anúncio: '.$dados[0]['tb_anuncio']['titulo_anuncio'];
								echo '<br /><br />Descrição do anúncio: <br /><br /><center>'.$dados[0]['tb_anuncio']['descricao_anuncio'];
								$nome_servico = $anuncioController->servicoAnuncios($dados[0]['tb_anuncio']['servico_id']);
								echo '</center><br /><br />Serviço do anúncio: '.$nome_servico[0]['tb_servico']['nome_servico'];
								echo '<br /><br />Modo de atendimento: '.$dados[0]['tb_anuncio']['modo_atendimento'];
							?>
						</div>
						<div align = "left" style="height: 300px; width: 300px; float: left; margin-left: 20px;">
							<?php 
								echo "<img src='/profinder/site/img/googlemaps.png' height='300' width='300' style= 'padding-top:0px'>";
							?>
						</div>
						<?php 
						}
					else if( $dados[0]['tb_anuncio']['modo_atendimento'] == "online" || $dados[0]['tb_anuncio']['modo_atendimento'] == "domiciliar")
					{
					?>
						<div style="height: 300px; width: 300px; float: left;">
						<?php 
							if($foto==null||$foto==0){
								echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='/profinder/site/img/sem-foto.jpg' height='300' width='300' style= 'padding-top:0px'> </a>";
							}
							else
							{
								$contador=0;
								while ($contador<sizeof($foto))
								{
									if ($contador==0)
									{
										echo "<img src='".$foto[0]['tb_foto']['caminho_foto']."' height='300' width='300'  style= 'padding-top:0px'></br> ";
							
									}
									else
									{
										echo "<img src='".$foto[$contador]['tb_foto']['caminho_foto']."' height='300' width='300' style= 'padding-top:0px'> ";
							
									}
									if ($contador==sizeof($foto)-1)
									{
										echo '</br>';
									}
									$contador++;
									
								}
							}
						?>
					
					</div>
					<div align = "left" style="height: 250px; width: 800px; float: left; margin-left: 20px;">
						<?php 
							echo 'Título do anúncio: '.$dados[0]['tb_anuncio']['titulo_anuncio'];
							echo '<br /><br />Descrição do anúncio: <br /><br /><center>'.$dados[0]['tb_anuncio']['descricao_anuncio'];
							$nome_servico = $anuncioController->servicoAnuncios($dados[0]['tb_anuncio']['servico_id']);
							echo '</center><br /><br />Serviço do anúncio: '.$nome_servico[0]['tb_servico']['nome_servico'];
							echo '<br /><br />Modo de atendimento: '.$dados[0]['tb_anuncio']['modo_atendimento'];
						?>
					</div>
					
					<?php 
					}?>
					
					<div align = "left" style="margin: 2px; clear: both; height: 50px; width: 800px; margin-left: 100px;">
						<?php 
							if ($sql<=5 && $sql>4.5)
							{
								echo "<img src=/profinder/site/img/star_5.png>";
							}
							else if ($sql>4)
							{
								echo "<img src=/profinder/site/img/star_4.5.png>";
							}
							else if ($sql>3.5)
							{
								echo "<img src=/profinder/site/img/star_4.png>";
							}
							else if ($sql>3)
							{
								echo "<img src=/profinder/site/img/star_3.5.png>";
							}
							else if ($sql>2.5)
							{
								echo "<img src=/profinder/site/img/star_3.png>";
							}
							else if ($sql>2)
							{
								echo "<img src=/profinder/site/img/star_2.5.png>";
							}
							else if ($sql>1.5)
							{
								echo "<img src=/profinder/site/img/star_2.png>";
							}
							else if ($sql>1)
							{
								echo "<img src=/profinder/site/img/star_1.5.png>";
							}
							else if ($sql>0.5)
							{
								echo "<img src=/profinder/site/img/star_1.png>";
							}
							else if ($sql!=0)
							{
								echo "<img src=/profinder/site/img/star_0.5.png>";
							}
							else 
							{
								echo "<img src=/profinder/site/img/star_0.png>";
							}
						?>
					</div>
				
					<center><h4>Comentários</h4></center>
				
					<div class = "panel panel-default" align = "left" style="width: 1200px; float: left;">
						<div align = "left" style="width: 120px; float: left; margin-left: 10px;">
							Nome disse: 
						</div>
						<div align = "left" style="width: 1000px; float: left; margin-left: 10px;">
							oi
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal View-->
<div class="modal fade" data-backdrop="static" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Dados do Bairro</h4>
      		</div>
      		<div class="modal-body">
      	
		        <?php 
		        
					echo $this->Form->create('Foto', array('action' => 'view'));
					echo $this->Form->input('legenda_foto', array('label' => 'Nome:'));
					
					$foto = $anunciosController->caminho_foto($id);
											
					if($foto==null||$foto==0)
					{
						echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='/profinder/site/img/sem-foto.jpg' height='200' width='200' style= 'padding-top:0px'> </a>";
					}
					else
					{
						echo "<a href='/profinder/site/anuncios/visualizar?id=".$id."'><img src='".$foto[0]['tb_foto']['caminho_foto']."' height='200' width='200' style= 'padding-top:0px'> </a>";
					}
					
					echo $this->Html->link(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
							array('controller' => 'anuncios','action' => 'visualizar'),
							array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
					
					echo $this->Form->end();
				 ?>
		
      		</div>
    	</div>
  	</div>
</div>