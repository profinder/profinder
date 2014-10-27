
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/profinder/site/js/jquery.easyWizard.js"></script>
<link href="/profinder/site/css/steps.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/bootstrap.css"/>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="lib/sweet-alert.min.js"></script> <link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">

<form id="myWizard"  action="" method="post" class="form-horizontal easyWizardElement easyPager" style="position: relative; overflow: hidden; text-align:center;">
					<?php
							echo $this->Form->create('Anuncio', array('action' => 'cadastro'));	
						?>
					<section class="step active" data-step-title="Dados do Anúncio" data-step="1" style="float: left; width: 968px;">
						<center>
						<table height = "200">
						
						<div class="control-group">
							<tr>
														<td>
														</br>
															<div class="input-group">
																<span class="input-group-addon">Título </span>
																	<?php
																		echo $this->Form->input('titulo_anuncio', array('class' => 'form-control', 'label' => ''));
																	?>
															</div>
														</td>
													</tr>
													
						</div>
						<div class="control-group">
							<tr>
														<td>
														</br>
															<div class="input-group">
																<span class="input-group-addon">Serviço </span>
																<?php
																	
																	App::import('Controller', 'Anuncios');
				
																	$anuncios = new AnunciosController;
																	$anuncios->constructClasses();
																	
																	App::import('Controller', 'Categorias');
				
																	$categorias = new CategoriasController;
																	$categorias->constructClasses();
																	$nomeCategorias=$categorias->nomeCategorias();
																	$servicos=$anuncios->nomeServico();
																	$anuncios->tipoAnuncio("salvar");
																	
																	$contador=0;
																	
																	?>
																	<select class="form-control" id="categorias" name="categorias">
																		<option>Selecione a categoria</option>
																		<?php
																			while($contador<sizeof($nomeCategorias))
																			{
																				?>
																				<option value='<?php echo $nomeCategorias[$contador]['Categoria']['id']?>'><?php echo $nomeCategorias[$contador]['Categoria']['nome_categoria']?></option>
																				<?php
																				$contador++;
																			}
																			?>
																	</select>
																	
																	<select class="form-control" id="servico" name="servico">
																		<option>Selecione o servico</option>
																		
																	</select>
																	
															</div>
														</td>
						</div>
						
						<div class="control-group">
						<tr>
						
														<td>
														
						</br>
														<div class="input-group">
															<span class="input-group-addon">Descrição </span>
																<?php
																	echo $this->Form->input('servico_id', array('type'=>'hidden'));
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
													
															</div>
														
									</table>	
									</center>						
					</section>
					
					<section class="step" data-step-title="Modo de atendimento" data-step="2" style="float: left; width: 968px; height: 1px;">
						<div class="control-group">
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
										<option>Selecione a cidade</option>
									</select>
									<center>
									<?php
									
										echo $this->Form->input('Endereco.cep', array('id' => 'cep', 'type'=>'hidden', 'onblur' => 'consultacepAnuncio(this.value)', 'placeholder' => 'CEP'));	
										echo "<br />";
										echo $this->Form->input('Endereco.logradouro', array('id' => 'logradouro', 'placeholder' => 'Rua ', 'type'=>'hidden'));
										echo "<br />";
										echo $this->Form->input('Endereco.localidade', array('id' => 'localidade', 'placeholder' => 'Cidade ', 'type'=>'hidden'));
										echo "<br />";
										echo $this->Form->input('Endereco.bairro', array('id' => 'bairro', 'placeholder' => 'Bairro ', 'type'=>'hidden'));
										echo "<br />";
										$opcoes[0]='';
										$contador=0;
										while ($contador<sizeof($estados))
										{
											$opcoes[$contador+1]=$estados[$contador]['tb_cidade']['estado_cidade'];
											$contador++;
										}
										
										
										echo $this->Form->input('Endereco.estado', array('options' => $opcoes,'id' => 'uf', 'style'=>'display:none;', 'label'=>''));echo "<br />";	
										echo $this->Form->input('Endereco.numero_endereco', array('label' => 'Número ', 'type'=>'hidden', 'value' => '1'));
										echo "<br />";	
										
										echo $this->Form->button(
												$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar Anúncio",
												array('type' => 'submit', 'class' => 'btn btn-info', 'escape' => false)
										);
									$this->Form->end();
									?>
													
									</center>
								</div>
							</div>
						</div>
					</section>
					
<script>
$('#myWizard').easyWizard({
    buttonsClass: 'btn',
   
    submitButton: false,
    nextButton: 'Próximo >',
    prevButton: ' < Anterior',
    before: function(wizardObj, currentStepObj, nextStepObj) {
        
    },
    after: function(wizardObj, prevStepObj, currentStepObj) {
       
    },
    beforeSubmit: function(wizardObj) {
       
    }
    
});
function goToStep3()
{
	$('#myWizard').easyWizard('goToStep', 3);
}


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

$(function(){
		$("#categorias").change(function(){
		var categoria = $(this).val();
			$.ajax({
				type:"POST",
				url: "/profinder/site/pages/ajax_buscar_servicos.php?categoria="+categoria,
				dataType:"text",
				success: function(res){
					$("#servico").children(".servicosOption").remove();
					$("#servico").append(res);
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
		document.getElementById('uf').style.display = 'inline';
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