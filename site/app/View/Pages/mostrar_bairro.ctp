<link href="/profinder/site/css/style2.css" rel="stylesheet" type="text/css" media="all" />
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
					<h2>Selecione os bairros que você está disponível a atender: </h2>
					<hr>
					<?php
						$cidades=$this->query("SELECT tb_bairro.id, tb_bairro.nome_bairro FROM tb_bairro inner join tb_logradouro on tb_bairro.id=tb_logradouro.id_cidade inner join tb_localidade on tb_localidade.id=tb_logradouro.id_cidade where tb_localidade.nome_localidade='curitiba';");
						echo $cidades;
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
							'escritorio' => 'Escritório',), 'onchange'=>"show(this.value)")
						);
						
						echo $this->Form->input('profissional_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
						?>
						<select id="estado" name="estado" style="display:none;"></select></br>

						<select id="cidade" name="cidade" style="display:none;"></select></br>
						
						<?php
						echo $this->Form->input('Endereco.cep', array('id' => 'cep', 'type'=>'hidden', 'onblur' => 'consultacepAnuncio(this.value)'), array('label' => 'CEP '));
						echo $this->Form->input('Endereco.logradouro', array('id' => 'logradouro', 'label' => 'Rua ', 'type'=>'hidden'));
						echo $this->Form->input('Endereco.localidade', array('id' => 'localidade', 'label' => 'Cidade ', 'type'=>'hidden'));
						echo $this->Form->input('Endereco.bairro', array('id' => 'bairro', 'label' => 'Bairro ', 'type'=>'hidden'));
						echo $this->Form->input('Endereco.uf', array('id' => 'uf', 'label' => 'Estado ', 'type'=>'hidden'));
						
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