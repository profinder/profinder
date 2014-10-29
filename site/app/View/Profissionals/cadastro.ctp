<link rel="stylesheet" href="css/bootstrap.css"/>
<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />

<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Novo Profissional</h2>
					</div>
					
					<div class="panel-body">
						<?php
							echo $this->Form->create('Profissional', array('action' => 'cadastro'));	
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
																	
																		echo $this->Form->input('username', array('class' => 'form-control', 'label' => '', 'placeholder' => 'email@email.com'));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Senha &nbsp &nbsp &nbsp &nbsp </span>
																	<input type="password", class="form-control", onblur="senha1(this.value)"/>
																<?php
																	echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'profissional'));
																?>
															</div>
														</td>
													</tr>
													
													<tr>
														<td>
															<div class="input-group">
																<span class="input-group-addon">Senha &nbsp &nbsp &nbsp &nbsp </span>
																	<input type="password", class="form-control", onblur="verificarSenha(this.value)"/>
																	
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
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.0.numero_telefone', array("onkeypress"=>"mascara( this);","maxlength"=>"14", 'class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													
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
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.1.numero_telefone', array("onkeypress"=>"mascara( this);","maxlength"=>"14",'class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													
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
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.2.numero_telefone', array("onkeypress"=>"mascara( this);","maxlength"=>"14",'class' => 'form-control', 'label' => ''));
																	?>
															</div>
														
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
						
						
					<?php 
					
						echo $this->Form->button(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar",
								array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
						);
						echo " ";
						echo $this->Html->link(
								$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
								array('controller' => 'pages','action' => 'index'),
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
	var senha1;
	function mascara(telefone){ 
	   if(telefone.value.length == 0)
		 telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
	   if(telefone.value.length == 3)
		  telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
	 
	 if(telefone.value.length == 9)
		 telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
	  
	}
	function senha1(senha){
		senha1=senha;
	}
	
	function verificarSenha(senha){
		
	 
		if (senha1 == senha)
			alert("SENHAS IGUAIS")
		else
			alert("SENHAS DIFERENTES")
	}
</script>
