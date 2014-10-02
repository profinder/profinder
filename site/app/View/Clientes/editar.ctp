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
								<li><a href="/profinder/site/pages/clientePerfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
			               		<li><?php echo $this->Html->link('Perfil', array('controller'=>'pages', 'action'=>'clientePerfil')); ?></li>
			               		<li><a href="/profinder/site/pages/clientePedidos">Meus pedidos</a></li>
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
					<h2>Perfil</h2>
					<?php  
					
						echo $this->Form->create('Cliente', array('action' => 'add'));
						echo $this->Form->input('id', array('type' => 'hidden'));
						echo $this->Form->input('nome_pessoa', array('label' => 'Nome:'));
						echo $this->Form->input('username', array('label' => 'E-mail:'));
						echo $this->Form->input('password', array('label' => 'Senha:', 'value' => ""));
						echo $this->Form->input('role', array('type' => 'hidden', 'value' => 'cliente'));
						
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
								array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
						echo " ";
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
								array('controller' => 'clientes','action' => 'perfil'),
								array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
						
						echo $this->Form->end();
					                   
		                   	
					?>
				
			 	</div>
			</div>
		</div>
	</div>
</div>
