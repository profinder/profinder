  
<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

	<!------ Slider ------------>
		
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
								<li><a href="/profinder/site/pages/perfilCliente"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
			               		<li><?php echo $this->Html->link('Perfil', array('controller'=>'pages', 'action'=>'perfilCliente')); ?></li>
			               		<li><a href="#">Notificações</a></li>
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
				
				<ul>
				
				
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
							
						<div class="clear"></div> 
				</ul>
			</div>
			</form>
			
		</div>
   </div>
  
		<!------End Slider ------------>
	
<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				<div class="panel panel-default">
					<div class="panel-heading">
					
						<h2 class="panel-title">Novo Anúncio</h2>
					</div>
					
					<div class="panel-body">
						<?php
							echo $this->Form->create('Anuncio', array('action' => 'add'));	
						?>
						<table>
							<tr>
								<td>
									<div class="top-box">
										<div class="panel panel-default">
											<div class="panel-heading">
												Dados do Anúncio
											</div>
											
											<div class="panel-body">
											<center>
												<table border="1" width="500" height = "130">
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Título </span>
																	<?php
																		echo $this->Form->input('titulo_anuncio', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													</tr>
													
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Serviço </span>
																<?php
																	
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
																	
																	echo $this->Form->select('servico_id', $options, array('class' => 'form-control'));
																?>
															</div>
														</td>
													</tr>
												</table>	
											</center>		
											</div>
										</div>
									</div>
							
								</td>
							
								<td> &nbsp &nbsp &nbsp &nbsp</td>
								
								<td>
									<div class="top-box">
										<div class="panel panel-default">
											<div class="panel-heading">
												Descrição
											</div>
												
											<div class="panel-body">
												<center>
												<table border="1" width="400" height = "130">
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Descrição </span>
																	<?php
																		echo $this->Form->input('descricao_anuncio', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>	
														
													</tr>
												</table>	
												</center>		
											</div>
										</div>
									</div>
								</td>
							</tr>
						</table>
						<div class="top-box">
							<div class="panel panel-default">
								<div class="panel-heading">
									Modo de Atendimento
								</div>
								
								<div class="panel-body">
								
								<?php 
									echo $this->Form->input('modo_atendimento', array('label' => 'Modo de atendimento: ', 'options' => array(
										'online' => 'On-line',
										'domiciliar' => 'Domiciliar',
										'escritorio' => 'Escritório',), 'onchange'=>"show(this.value)")
									);
									echo $this->Form->input('profissional_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
																	
								?>
									
									<select id="estado" name="estado" style="display:none;"></select><br />
									<select id="cidade" name="cidade" style="display:none;"></select><br />
									<center>
									<?php
									
										echo $this->Form->input('Endereco.cep', array('id' => 'cep', 'type'=>'hidden', 'onblur' => 'consultacepAnuncio(this.value)', 'label' => 'CEP: '));	
										echo "<br />";
										echo $this->Form->input('Endereco.logradouro', array('id' => 'logradouro', 'label' => 'Rua ', 'type'=>'hidden'));
										echo "<br />";
										echo $this->Form->input('Endereco.localidade', array('id' => 'localidade', 'label' => 'Cidade ', 'type'=>'hidden'));
										echo "<br />";
										echo $this->Form->input('Endereco.bairro', array('id' => 'bairro', 'label' => 'Bairro ', 'type'=>'hidden'));
										echo "<br />";
										echo $this->Form->input('Endereco.estado', array('id' => 'uf', 'label' => 'Estado ', 'type'=>'hidden'));
										echo "<br />";	
										echo $this->Form->input('Endereco.numero_endereco', array('label' => 'Número ', 'type'=>'hidden', 'value' => '1'));
										echo "<br />";	
									
									?>
													
									</center>
								</div>
							</div>
						</div>
						
					<?php 
					
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar",
								array('type' => 'submit', 'class' => 'btn btn-default', 'escape' => false)
						);
						echo " ";
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
								array('controller' => 'Users','action' => 'index'),
								array('role' => 'button', 'class' => 'btn btn-default', 'escape' => false)
						);	
						echo " ";
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil'))." Limpar",
								array('type' => 'reset', 'class' => 'btn btn-default', 'escape' => false)
						);			
						echo $this->Form->end();
					?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
		
</body>
</html>


    	
    	
            