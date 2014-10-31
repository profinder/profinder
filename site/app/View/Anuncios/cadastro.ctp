<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/profinder/site/js/jquery.easyWizard.js"></script>
<link href="/profinder/site/css/steps.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/bootstrap.css"/>
<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="lib/sweet-alert.min.js"></script> <link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">

<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				<div style="background:url(/profinder/site/app/webroot/img/background.png) bottom no-repeat; height: 700px; width: 1600px; margin-left: -200px; margin-top:-100px;">
					<div class="panel panel-default" style="height: 570px; width: 1000px; margin-left: 300px; margin-top:70px;">
						<form id="myWizard"  action="" method="post" class="form-horizontal easyWizardElement easyPager" style="position: relative; overflow: hidden; text-align:center;">
							<?php
								echo $this->Form->create('Anuncio', array('action' => 'cadastro'));	
							?>
							<section class="step active" data-step-title="Dados do Anúncio" data-step="1" style="float: left; width: 968px;">
							<center>
								<div class align = "center" style="height: 420px; width: 700px;">
								<br /><br />
									<div class="control-group">
										<div class="input-group">
											<span class="input-group-addon">Nome &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span>
											<?php
												echo $this->Form->input('titulo_anuncio', array('class' => 'form-control', 'label' => ''));
											?>
										</div>
									</div>
									<br />
									<div class="control-group">
										<div class="input-group">
											<span class="input-group-addon">Categoria &nbsp &nbsp &nbsp</span>
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
										</div>
									</div>
									<br />
									<div class="control-group">
										<div class="input-group">
											<span class="input-group-addon">Serviço &nbsp &nbsp &nbsp &nbsp &nbsp</span>
											<select class="form-control" id="servico" name="servico">
												<option>Selecione o servico</option>
											</select>
										</div>
									</div>
									<br />		
									<div class="control-group">
										<div class="input-group">
											<span class="input-group-addon">Descrição &nbsp &nbsp &nbsp</span>
											<?php
												echo $this->Form->input('servico_id', array('type'=>'hidden'));
												echo $this->Form->input ( 'descricao_anuncio', array (
													'class' => 'form-control',
													'type' => 'textarea',
													'label' => '',
													'style' => 'width:585px; height:133px; resize:none;' 
												) );
											?>
										</div>
									</div>
								</div>	
							</center>						
					</section>
					
					<section class="step" data-step-title="Modo de atendimento" data-step="2" style="float: left; width: 968px; height: 1px;">
						<br /><br />
						<div class = "panel panel-default" align = "center" style="height: 330px; width: 700px; margin-left: 145px;">
							<div class="control-group">
								<div class="input-group">
									<span class="input-group-addon">Modo de atendimento &nbsp &nbsp &nbsp</span>
										<?php 
											echo $this->Form->input('modo_atendimento', array('label' => '', 'class' => 'form-control','options' => array(
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
								</div>
							</div>
									
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
							
							<br />
							<div class="control-group" style="display: none;" id="div-cep">
								<div class="input-group">
									<span class="input-group-addon">CEP &nbsp &nbsp &nbsp &nbsp &nbsp</span>
									<?php 
										echo $this->Form->input('Endereco.cep', array('label'=>'','id' => 'cep', 'class' => 'form-control', 'style'=>'display:none', 'onblur' => 'consultacepAnuncio(this.value)', 'placeholder' => 'CEP'));	
									?>
								</div>
							</div>	
							
							<br />
							<div style="display: none; width: 257px; float:left;" id = "div1">
								<div class="control-group" style="display: none; float: left;" id="div2">
									<div class="input-group">
										<span class="input-group-addon">Estado &nbsp &nbsp &nbsp</span>
										<?php 
											echo $this->Form->input('Endereco.estado', array('label'=>'','id' => 'uf', 'class' => 'form-control', 'style'=>'display:none'));	
										?>
									</div>
								</div>	
							</div>
							<div style="display: none; width: 400px; float:left; margin-left: 40px;" id = "div3">
								<div class="control-group" style="display: none;" id="div4">
									<div class="input-group">
										<span class="input-group-addon">Cidade &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span>
										<?php 
											echo $this->Form->input('Endereco.localidade', array('label'=>'','id' => 'localidade', 'class' => 'form-control', 'style'=>'display:none'));	
										?>
									</div>
								</div>
								<br />	
							</div>
							
							<div class="control-group" style="display: none;" id="div5">
								<div class="input-group">
									<span class="input-group-addon">Bairro &nbsp &nbsp &nbsp &nbsp</span>
									<?php 
										echo $this->Form->input('Endereco.bairro', array('label'=>'','id' => 'bairro', 'class' => 'form-control', 'style'=>'display:none'));	
									?>
								</div>
							</div>
							<br />
							<div class="control-group" style="display: none;" id="div6">
								<div class="input-group">
									<span class="input-group-addon">Logradouro </span>
									<?php 
										echo $this->Form->input('Endereco.logradouro', array('label'=>'','id' => 'logradouro', 'class' => 'form-control', 'style'=>'display:none'));	
									?>
								</div>
							</div>	
							<br />
							<div style="display: none; width: 257px; float:left;" id = "div7">
								<div class="control-group" style="display: none; float: left;" id="div8">
									<div class="input-group">
										<span class="input-group-addon">Número &nbsp &nbsp &nbsp</span>
										<?php 
											echo $this->Form->input('Endereco.numero_endereco', array('label'=>'','id' => 'numero_endereco', 'class' => 'form-control', 'style'=>'display:none'));	
										?>
									</div>
								</div>	
							</div>
							<div style="display: none; width: 400px; float:left; margin-left: 40px;" id = "div9">
								<div class="control-group" style="display: none;" id="div10">
									<div class="input-group">
										<span class="input-group-addon">Complemento &nbsp</span>
										<?php 
											echo $this->Form->input('Endereco.complemento', array('label'=>'','id' => 'complemento', 'class' => 'form-control', 'style'=>'display:none'));	
										?>
									</div>
								</div>
								<br />	
							</div>
								
							</center>
							</div>
							<?php 
								echo $this->Form->button(
									$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar Anúncio",
									array('type' => 'submit', 'class' => 'btn btn-info', 'escape' => false)
								);
								$this->Form->end();
							?>
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

		document.getElementById('estado').style.display = 'none';
		document.getElementById('cidadesSelect').style.display = 'none';
		document.getElementById('div-cep').style.display = 'inline';
		document.getElementById('cep').style.display = 'inline';
		document.getElementById('uf').style.display = 'inline';
		document.getElementById('localidade').style.display = 'inline';
		document.getElementById('bairro').style.display = 'inline';
		document.getElementById('logradouro').style.display = 'inline';	
		document.getElementById('numero_endereco').style.display = 'inline';	
		document.getElementById('complemento').style.display = 'inline';	
		document.getElementById('div1').style.display = 'inline';
		document.getElementById('div2').style.display = 'inline';
		document.getElementById('div3').style.display = 'inline';
		document.getElementById('div4').style.display = 'inline';
		document.getElementById('div5').style.display = 'inline';
		document.getElementById('div6').style.display = 'inline';
		document.getElementById('div7').style.display = 'inline';
		document.getElementById('div8').style.display = 'inline';
		document.getElementById('div9').style.display = 'inline';
		document.getElementById('div10').style.display = 'inline';
		
	}
	else if(modo_atendimento=="domiciliar")
	{
		document.getElementById('estado').style.display = 'inline';
		document.getElementById('cidadesSelect').style.display = 'inline';
		document.getElementById('div-cep').style.display = 'none';
		document.getElementById('cep').style.display = 'none';
		document.getElementById('uf').style.display = 'none';
		document.getElementById('localidade').style.display = 'none';
		document.getElementById('bairro').style.display = 'none';
		document.getElementById('logradouro').style.display = 'none';	
		document.getElementById('numero_endereco').style.display = 'none';	
		document.getElementById('complemento').style.display = 'none';	
		document.getElementById('div1').style.display = 'none';
		document.getElementById('div2').style.display = 'none';
		document.getElementById('div3').style.display = 'none';
		document.getElementById('div4').style.display = 'none';
		document.getElementById('div5').style.display = 'none';
		document.getElementById('div6').style.display = 'none';
		document.getElementById('div7').style.display = 'none';
		document.getElementById('div8').style.display = 'none';
		document.getElementById('div9').style.display = 'none';
		document.getElementById('div10').style.display = 'none';
		
	}
	else if(modo_atendimento=="online")
	{
		document.getElementById('estado').style.display = 'none';
		document.getElementById('cidadesSelect').style.display = 'none';
		document.getElementById('div-cep').style.display = 'none';
		document.getElementById('cep').style.display = 'none';
		document.getElementById('uf').style.display = 'none';
		document.getElementById('localidade').style.display = 'none';
		document.getElementById('bairro').style.display = 'none';
		document.getElementById('logradouro').style.display = 'none';	
		document.getElementById('numero_endereco').style.display = 'none';	
		document.getElementById('complemento').style.display = 'none';	
		document.getElementById('div1').style.display = 'none';
		document.getElementById('div2').style.display = 'none';
		document.getElementById('div3').style.display = 'none';
		document.getElementById('div4').style.display = 'none';
		document.getElementById('div5').style.display = 'none';
		document.getElementById('div6').style.display = 'none';
		document.getElementById('div7').style.display = 'none';
		document.getElementById('div8').style.display = 'none';
		document.getElementById('div9').style.display = 'none';
		document.getElementById('div10').style.display = 'none';
	}
}

function correiocontrolcep(valor)
{
	if (valor.erro) 
	{
		alert('Cep não encontrado');       
		return;
	};

	document.getElementById('uf').value=valor.uf
	document.getElementById('localidade').value=valor.localidade
	document.getElementById('bairro').value=valor.bairro
	document.getElementById('logradouro').value=valor.logradouro
}
				
function addCampo() 
{
	document.getElementById("duplicaCampo").innerHTML += "<input type='text' name='campo[]' />";
}
</script>
						</div>	
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
