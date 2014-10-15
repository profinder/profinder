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
																		echo $this->Form->input('id', array('type' => 'hidden'));
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
																<?php
																	echo $this->Form->input('password', array('class' => 'form-control', 'label' => '', 'value'=>''));
																	echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'profissional'));?>
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
								<?php
								App::import('Controller', 'Profissionals');
				
								$profissional = new ProfissionalsController;
								$profissional->constructClasses();
								$profissional->tipoProfissional("editar");
								$idProfissional=$this->Session->read('idProfissional');
								
								$telefones=$profissional->buscarTelefone($idProfissional);
								$contador=1;
								$contador2=2;
								if ($contador2==sizeof($telefones))
								{
									$telefones[2]['tb_telefone']['ddd_telefone']="";
									$telefones[2]['tb_telefone']['numero_telefone']="";
									$telefones[2]['tb_telefone']['tipo_telefone']="";
								}
								else if ($contador==sizeof($telefones))
								{
									$telefones[1]['tb_telefone']['ddd_telefone']="";
									$telefones[1]['tb_telefone']['numero_telefone']="";
									$telefones[1]['tb_telefone']['tipo_telefone']="";
									$telefones[2]['tb_telefone']['ddd_telefone']="";
									$telefones[2]['tb_telefone']['numero_telefone']="";
									$telefones[2]['tb_telefone']['tipo_telefone']="";
								}
									
								?>
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
																		echo $this->Form->input('Telefone.0.ddd_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[0]['tb_telefone']['ddd_telefone']));
																	?>
															</div>
														</td>	
														<td>
															<div class="input-group">
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.0.numero_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[0]['tb_telefone']['numero_telefone']));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td> 
															<div class="input-group">
																<span class="input-group-addon">Tipo &nbsp &nbsp &nbsp &nbsp </span>
																
																	<?php 
																		echo $this->Form->input('Telefone.0.tipo_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[0]['tb_telefone']['tipo_telefone'], 'options' => array(
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
																		echo $this->Form->input('Telefone.1.ddd_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[1]['tb_telefone']['ddd_telefone']));
																	?>
															</div>
														</td>	
														<td>
															<div class="input-group">
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.1.numero_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[1]['tb_telefone']['numero_telefone']));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td> 
															<div class="input-group">
																<span class="input-group-addon">Tipo &nbsp &nbsp &nbsp &nbsp </span>
																
																	<?php 
																		echo $this->Form->input('Telefone.1.tipo_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[1]['tb_telefone']['tipo_telefone'],  'options' => array(
																			'' => '',
																			'residencial' => 'Residencial',
																			'celular' => 'Celular',
																			'escritorio' => 'Escritório',
																			))
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
																		echo $this->Form->input('Telefone.2.ddd_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[2]['tb_telefone']['ddd_telefone']));
																	?>
															</div>
														</td>	
														<td>
															<div class="input-group">
																<span class="input-group-addon">Número</span>
																	<?php
																		echo $this->Form->input('Telefone.2.numero_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[2]['tb_telefone']['numero_telefone']));
																	?>
															</div>
														</td>
													</tr>
													<tr>
														<td> 
															<div class="input-group">
																<span class="input-group-addon">Tipo &nbsp &nbsp &nbsp &nbsp </span>
																
																	<?php 
																		echo $this->Form->input('Telefone.2.tipo_telefone', array('class' => 'form-control', 'label' => '', 'value'=>$telefones[2]['tb_telefone']['tipo_telefone'], 'options' => array(
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
