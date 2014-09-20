<link rel="stylesheet" href="css/bootstrap.css"/>
<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />

<div class="header">
	<div class="wrap">
		<div class="header-top">
			<div class="logo">
				<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style="padding-top: 0px"> </a>
			</div>
		</div>
	</div>
</div>

<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Novo Cliente</h2>
					</div>
					
					<div class="panel-body">
						<?php
							echo $this->Form->create('Cliente', array('action' => 'add'));	
						?>
						<table height = "200">
							<tr>
								<td>
									<div class="top-box">
										<div class="panel panel-default">
											<div class="panel-heading">
												Dados Pessoais
											</div>
											
											<div class="panel-body">
											<center>
												<table border="1" width="550" height = "300">
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Nome &nbsp &nbsp &nbsp &nbsp &nbsp</span>
																	<?php
																		echo $this->Form->input('nome_pessoa', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Email &nbsp &nbsp &nbsp &nbsp</span>
																	<?php
																		echo $this->Form->input('username', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Senha &nbsp &nbsp &nbsp &nbsp </span>
																<?php
																	echo $this->Form->input('password', array('class' => 'form-control', 'label' => ''));
																	echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'cliente'));?>
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
												Dados do Telefone
											</div>
												
											<div class="panel-body">
												<center>
												<table border="1" width="550" height = "300">
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">DDD</span>
																	<?php
																		echo $this->Form->input('Telefone.0.ddd_telefone', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>	
														<td>
															<div class="input-group">
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.0.numero_telefone', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td> 
															<div class="input-group">
																<span class="input-group-addon">Tipo &nbsp &nbsp &nbsp &nbsp </span>
																
																	<?php 
																		echo $this->Form->input('Telefone.0.tipo_telefone', array('class' => 'form-control', 'label' => '', 'options' => array(
																			'' => '',
																			'residencial' => 'Residencial',
																			'celular' => 'Celular',
																			'escritorio' => 'Escritório',))
																		);
																	?>
															</div>
														</td>
													</tr>
	<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">DDD</span>
																	<?php
																		echo $this->Form->input('Telefone.1.ddd_telefone', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>	
														<td>
															<div class="input-group">
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.1.numero_telefone', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td> 
															<div class="input-group">
																<span class="input-group-addon">Tipo &nbsp &nbsp &nbsp &nbsp </span>
																
																	<?php 
																		echo $this->Form->input('Telefone.1.tipo_telefone', array('class' => 'form-control', 'label' => '', 'options' => array(
																			'' => '',
																			'residencial' => 'Residencial',
																			'celular' => 'Celular',
																			'escritorio' => 'Escritório',))
																		);
																	?>
															</div>
														</td>
													</tr>
	<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">DDD</span>
																	<?php
																		echo $this->Form->input('Telefone.2.ddd_telefone', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>	
														<td>
															<div class="input-group">
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.2.numero_telefone', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td> 
															<div class="input-group">
																<span class="input-group-addon">Tipo &nbsp &nbsp &nbsp &nbsp </span>
																
																	<?php 
																		echo $this->Form->input('Telefone.2.tipo_telefone', array('class' => 'form-control', 'label' => '', 'options' => array(
																			'' => '',
																			'residencial' => 'Residencial',
																			'celular' => 'Celular',
																			'escritorio' => 'Escritório',))
																		);
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
									Dados Endereço
								</div>
								
								<div class="panel-body">
									<center>
									<table border="1" width="800" height = "350">
										<tr>
											<td>
												<div class="input-group">
													<span class="input-group-addon">CEP</span>
														<?php echo $this->Form->input('Endereco.cep', array('id' => 'cep', 'class' => 'form-control', 'onblur' => 'consultacep(this.value)', 'label' => '')); ?>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="input-group">
													<span class="input-group-addon">Logradouro </span>
														<?php
															echo $this->Form->input('Endereco.logradouro', array('id' => 'logradouro', 'class' => 'form-control', 'label' => ''));
														?>
												</div>								
											</td>
										</tr>
										<tr>
											<td>
												<div class="input-group">
													<span class="input-group-addon">Localidade</span>
													<?php
														echo $this->Form->input('Endereco.localidade', array('id' => 'localidade', 'class' => 'form-control', 'label' => ''));
													?>
												</div>								
											</td>	
										</tr>
										<tr>
											<td>
												<div class="input-group">
													<span class="input-group-addon">Bairro</span>
														<?php
															echo $this->Form->input('Endereco.bairro', array('id' => 'bairro', 'class' => 'form-control', 'label' => ''));
														?>
												</div>								
											</td>	
										</tr>
										<tr>
											<td>
												<div class="input-group">
													<span class="input-group-addon">Estado</span>
														<?php
															echo $this->Form->input('Endereco.estado', array('id' => 'uf', 'class' => 'form-control', 'label' => ''));
														?>
												</div>								
											</td>							
										</tr>
										<tr>
											<td>
												<div class="input-group">
													<span class="input-group-addon">Número</span>
														<?php
															echo $this->Form->input('Endereco.numero_endereco', array('class' => 'form-control', 'label' => ''));
														?>
												</div>								
											</td>		
										</tr>
										
										<tr>
											<td>
												<div class="input-group">
													<span class="input-group-addon">Complemento</span>
														<?php
															echo $this->Form->input('Endereco.complemento', array('class' => 'form-control', 'label' => ''));
														?>
												</div>								
											</td>	
										</tr>
									</table>			
									</center>
								</div>
							</div>
						</div>
						
					<?php 
					
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar",
								array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
						);
						echo " ";
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
								array('controller' => 'Clientes','action' => 'index'),
								array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
						);	
						
						echo $this->Form->end();
					?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function consultacep(cep)
	{
		cep = cep.replace(/\D/g,"")
	    url="http://cep.correiocontrol.com.br/"+cep+".js"
	    s=document.createElement('script')
	    s.setAttribute('charset','utf-8')
	    s.src=url
	    document.querySelector('head').appendChild(s)
	}
	 
	function correiocontrolcep(valor)
	{
		if (valor.erro) 
		{
	    	alert('Cep não encontrado');       
	        return;
		};

	    document.getElementById('logradouro').value=valor.logradouro
	    document.getElementById('bairro').value=valor.bairro
	    document.getElementById('localidade').value=valor.localidade
	    document.getElementById('uf').value=valor.uf
	}
		
	function addCampo() 
	{
		document.getElementById("duplicaCampo").innerHTML += "<input type='text' name='campo[]' />";
	}
</script>
