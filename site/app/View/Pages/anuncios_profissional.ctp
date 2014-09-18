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
			
					<h2>Meus anúncios</h2>
					<?php
					App::import('Controller', 'Pages');
					$anuncios = new PagesController;
					$pages->constructClasses();
					$anuncios=$pages->anuncios(AuthComponent::user('id'));
					
					?>
					<table>
					<tr>
						<th>Código</th>
						<th>Título do anúncio</th>
						<th>Modo de atendimento</th>
						<th>Tipo de serviço</th>
						<th>Ações</th>
						
					</tr>
				   
					<?php foreach ($anuncios as $anuncio): ?>
					<tr><td>
					<?php echo $anuncio['Anuncio']['titulo_anuncio']; ?></td>
						<td>
							<?php
								echo $anuncio['Anuncio']['modo_atendimento'];
							?>
						</td>
						<td>
							<?php
								echo $anuncio['Anuncio']['id_servico'];
							?>
						</td>
						<td>
							<?php
								echo $this->Html->link(
									$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . " Editar",
									array('controller' => 'anuncios', 'action' => 'edit', $anuncio['Anuncio']['id'], 'role' => 'button'),
									array('class' => 'btn btn-warning', 'escape' => false, "data-toggle"=>"modal",
									"data-target"=>"#myModal"));
							?>
							<?php
								echo $this->Form->postLink(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Remover",
								array('controller' => 'anuncios','action' => 'delete', $anuncio['Anuncio']['id']),
								array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
							?>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php unset($cliente); ?>
					</table>
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
	
	