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
		                		Opções
		                		<b class="caret"></b>
		                	</a>
							<ul class="dropdown-menu">
			               		<li><a href="/profinder/site/pages/perfilProfissional"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
			               		<li><a href="/profinder/site/pages/anunciosProfissional">Meus anúncios</a></li>
			               		<li><a href="/profinder/site/pages/pedidos_solicitados_profissional">Solicitações de serviço</a></li>
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
			
					<h2>Meus anúncios</h2>
					
					<?php 
						$pages = new PagesController;
						$pages->constructClasses();
						$anunciosProfissional = $pages->anunciosProfissional(AuthComponent::user('id'));
						
						$contador=0;
						while ($contador!=sizeof($anunciosProfissional))
						{
							$titulo = $anunciosProfissional[$contador]['tb_anuncio']['titulo_anuncio'];
							$id = $anunciosProfissional[$contador]['tb_anuncio']['id'];
							$descricao = $anunciosProfissional[$contador]['tb_anuncio']['descricao_anuncio'];
							$modo_atendimento = $anunciosProfissional[$contador]['tb_anuncio']['modo_atendimento'];
							
							//echo $anuncio_titulo;
							//echo "<br/>";
							
					?>
					<div class="top-box">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="panel-title"><?php echo $titulo; ?></h2>
							</div>
							<div class="panel-body">
								<table border="2" width="40" height = "60">
									<tr>
										<td>
											<li>Descrição:</li> 
												<div class="top-box">
													<div class="panel panel-default">
								        				<?php echo $descricao; ?>
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
											<?php echo $this->Html->link(
								        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . "",
								        			array('controller' => 'anuncios', 'action' => 'edit', $id, 'role' => 'button'),
													array('class' => 'btn btn-default', 'escape' => false, "data-toggle"=>"modal",
													"data-target"=>"#myModal"));
								        	?>
								        	<?php
								        		echo $this->Form->postLink(
								        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
								        			array('controller' => 'pages', 'action' => 'removerAnuncio', $id),
								        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-default', 'escape' => false));
								        	?>
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

<div class="modal fade" id="myModalAnuncio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Bairro</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('Anuncio', array('action' => 'add'));
			echo $this->Form->input('titulo_anuncio', array('label' => 'Titulo:'));
			$anuncios = new AnunciosController;
						$anuncios->constructClasses();
						$servicos=$anuncios->nomeServico();
						$contador=0;
						$options= array();
						
						while($contador<sizeof($servicos))
						{
							array_push($options, array($servicos[$contador]['Servico']['id'] => $servicos[$contador]['Servico']['nome_servico']));
							$contador++;
						}
						echo "Serviço: ";
						echo $this->Form->select('id_servico', $options);
					
						echo $this->Form->input('modo_atendimento', array('label' => 'Modo de atendimento: ', 'options' => array(
							'online' => 'On-line',
							'domiciliar' => 'Domiciliar',
							'escritorio' => 'Escritório',))
						);
						
						echo $this->Form->input('profissional_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
						
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Bairros','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
</div>
	
	