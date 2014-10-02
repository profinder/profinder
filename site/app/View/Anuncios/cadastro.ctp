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
					
						<h2 class="panel-title">Novo Anúncio</h2>
					</div>
					
					<div class="panel-body">
						<?php
							echo $this->Form->create('Anuncio', array('action' => 'cadastro'));	
						?>
						<table height = "200">
							<tr>
								<td>
									<div class="top-box">
										<div class="panel panel-default">
											
											<div class="panel-body">
											<center>
												<table border="1" width="1120" height = "500">
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
														<tr>
														<td>
														<div class="input-group">
															<span class="input-group-addon">Descrição </span>
																<?php
																	echo $this->Form->input ( 'descricao_anuncio', array (
																		'class' => 'form-control',
																		'type' => 'textarea',
																		'label' => '',
																		'style' => 'width:1000px; height:133px; resize:none;' 
																	) );

																?>
															</div>
															</td>
															</tr>
													<tr>
														<td>
														<?php echo $this->Form->input('Anuncio.Foto.legenda_foto', array('type' => 'file'));
																		echo $this->Form->input('Anuncio.Foto.caminho_foto');
														?>
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
									
									App::import('Controller', 'Cidades');
				
									$cidades = new CidadesController;
									$cidades->constructClasses();
									$estados=$cidades->estados();	
								?>
									
									<select name="estado" id="estado" style="display:none;">
										<option value="">Selecione...</option>
										<?php 
										   $contador=0;
											while ($contador<sizeof($estados))
											{
											  echo "<option value='{$estados[$contador]['tb_cidade']['estado_cidade']}'>{$estados[$contador]['tb_cidade']['estado_cidade']}</option>";
											  $contador++;
											}
										?>
									</select>
									<select id="cidadesSelect" name="cidadesSelect" style="display:none;">
										<option>Selecione o estado</option>
									</select>
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
		
<script>
	$(function(){
		$("#estado").change(function(){
		var estado = $(this).val();
		alert(estado)
			$.ajax({
				type:"POST",
				url: "/profinder/site/pages/ajax_buscar_cidades.php?estado="+estado,
				dataType:"text",
				success: function(res){
					$("#cidadesSelect").children(".cidadesOption").remove();
					$("#cidadesSelect").append(res);
				}
		});
	});
});
	function consultacepAnuncio(cep)
	{
		cep = cep.replace(/\D/g,"")
	 	url="http://cep.correiocontrol.com.br/"+cep+".js"
		s=document.createElement('script')
		s.setAttribute('charset','utf-8')
		s.src=url
		document.querySelector('head').appendChild(s)
	}				
	function show(modo_atendimento)
	{
		if (modo_atendimento=="escritorio")
		{
			document.getElementById('cep').type = 'text';
			document.getElementById('logradouro').type = 'text';	
			document.getElementById('localidade').type = 'text';
			document.getElementById('bairro').type = 'text';
			document.getElementById('uf').type = 'text';
			document.getElementById('estado').style.display = 'none';
			document.getElementById('cidadesSelect').style.display = 'none';
		}
		else if(modo_atendimento=="domiciliar")
		{
			document.getElementById('estado').style.display = 'inline';
			document.getElementById('cidadesSelect').style.display = 'inline';
			document.getElementById('cep').type = 'hidden';
			document.getElementById('logradouro').type = 'hidden';	
			document.getElementById('localidade').type = 'hidden';
			document.getElementById('bairro').type = 'hidden';
			document.getElementById('uf').type = 'hidden';
		}
		else if(modo_atendimento=="online")
		{
			document.getElementById('estado').style.display = 'none';
			document.getElementById('cidadesSelect').style.display = 'none';
			document.getElementById('cep').type = 'hidden';
			document.getElementById('logradouro').type = 'hidden';	
			document.getElementById('localidade').type = 'hidden';
			document.getElementById('bairro').type = 'hidden';
			document.getElementById('uf').type = 'hidden';
		}
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
	
	