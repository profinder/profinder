<link href="/profinder/site/css/style2.css" rel="stylesheet" type="text/css" media="all" />
	
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
		                		Opções
		                		<b class="caret"></b>
		                	</a>
							<ul class="dropdown-menu">
			               		<li><a href="/profinder/site/pages/perfilProfissional">Perfil</a></li>
			               		<li><a href="/profinder/site/pages/anunciosProfissional">Meus anúncios</a></li>
			               		<li><a href="#">Notificações</a></li>
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
					<h2>Novo Anúncio</h2>
					<hr>
					
					<?php
						echo $this->Form->create('Anuncio', array('action' => 'add'));
						echo $this->Form->input('titulo_anuncio');
						
						App::import('Controller', 'Anuncios');
			
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
						
						echo $this->Form->input('id_profissional', array('type' => 'hidden', 'value' => AuthComponent::user("id")));

						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
								array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
						);
						echo " ";
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
								array('controller' => 'Users', 'action' => 'index'),
								array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
						);
						
						echo $this->Form->end();
				?>
					
			 	</div>
			</div>
		</div>
	</div>
</div>
	
	