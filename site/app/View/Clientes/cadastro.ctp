<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="main" style = "background:url(/profinder/site/app/webroot/img/background.png) bottom no-repeat; height: 1180px; width: 1770px; margin-left: -200px; margin-top:-100px;">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				<div>
					<div class="panel panel-default" style="height: 970px; width: 1000px; margin-left: 300px; margin-top:70px;">
						<div class="panel-heading">
							<font size = "4">Cadastro de Cliente</font>
						</div>
						
						<div class="panel-body">
							<?php
								echo $this->Form->create('Cliente', array('action' => 'cadastro'));	
							?>
							<br /><br />
							<div align = "center" style="height: 700px; width: 700px; margin-left: 120px;">
								<div class="input-group">
									<span class="input-group-addon">Nome &nbsp &nbsp &nbsp &nbsp &nbsp</span>
									<?php
										$nome=$this->Session->read('nome');
										echo $this->Form->input('nome_pessoa', array('class' => 'form-control', 'value'=>$nome, 'label' => ''));
									?>
								</div>
								<br />
								<div class="input-group">
									<span class="input-group-addon">E-mail &nbsp &nbsp &nbsp &nbsp &nbsp</span>
									<?php
										$username=$this->Session->read('username');
										echo $this->Form->input('username', array('class' => 'form-control', 'value'=>$username, 'label' => '', 'placeholder' => 'email@email.com'));
									?>
								</div>	
								<br />
								<div class="input-group">
									<span class="input-group-addon">Senha &nbsp &nbsp &nbsp &nbsp &nbsp </span>
									<?php
										echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'cliente'));
										echo $this->Form->input('password', array('class' => 'form-control', 'label' => ''));
									?>
								</div>
								<br />
								<div class="input-group">
									<span class="input-group-addon">Confirmação &nbsp </span>
									<?php
										echo $this->Form->input('confirmar_senha', array('type' => 'password','onblur'=>"verificarSenha(this.value)", 'class' => 'form-control', 'label' => ''));
									?>
								</div>
								<div align = "left">
								<label><font id="label" color = "white">As senhas não correspondem!</font></label>
								</div>
								<br /><br />
								<center><hr></center>
								<br /><br />
								
								<div align = "left" style="height: 160px; width: 350px; float: left;">
									<div class="input-group">
										<span class="input-group-addon">Número</span>
										<?php
											echo $this->Form->input('Telefone.0.numero_telefone', array("onkeypress"=>"mascara( this);","maxlength"=>"14", 'class' => 'form-control', 'label' => '', 'placeholder' => "(00) 0000-0000"));
										?>
									</div>
									<br />
									<div class="input-group">
										<span class="input-group-addon">Número</span>
										<?php
											echo $this->Form->input('Telefone.1.numero_telefone', array("onkeypress"=>"mascara( this);","maxlength"=>"14",'class' => 'form-control', 'label' => '', 'placeholder' => "(00) 0000-0000"));
										?>
									</div>	
									<br />
									<div class="input-group">
										<span class="input-group-addon">Número</span>
										<?php
											echo $this->Form->input('Telefone.2.numero_telefone', array("onkeypress"=>"mascara( this);","maxlength"=>"14",'class' => 'form-control', 'label' => '', 'placeholder' => "(00) 0000-0000"));
										?>
									</div>
								</div>	
								<div align = "left" style="height: 160px; width: 300px; float: left; margin-left: 50px;">
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
									<br />
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
									<br />
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
								</div>
								<div align = "center" style="width: 700px; margin-top: 190px;">
									<center><hr></center>
									<br /><br />
									<div class="input-group">
										<span class="input-group-addon">CEP &nbsp &nbsp &nbsp &nbsp &nbsp </span>
										<?php 
											echo $this->Form->input('Endereco.cep', array(
												'id' => 'cep', 
												'onblur' => 'consultacep(this.value)', 
												'label' => '',
												'class' => 'form-control'
											)); 
										?>
									</div>		
									<br />
									<div align = "left" style="width: 250px; float: left;">
										<div class="input-group">
											<span class="input-group-addon">Estado &nbsp &nbsp &nbsp </span>
											<?php 
												echo $this->Form->input('Endereco.estado', array(
													'id' => 'uf', 
													'label' => '',
													'class' => 'form-control'
												));
											?>
										</div>		
									</div>
									<div align = "left" style="width: 398px; margin-left: 299px;">
										<div class="input-group">
											<span class="input-group-addon">Cidade &nbsp &nbsp &nbsp &nbsp &nbsp </span>
											<?php 
												echo $this->Form->input('Endereco.localidade', array(
													'id' => 'localidade', 
													'label' => '',
													'class' => 'form-control'
												));
											?>
										</div>		
									</div>
									<br />
									<div class="input-group">
										<span class="input-group-addon">Bairro &nbsp &nbsp &nbsp &nbsp </span>
										<?php 
											echo $this->Form->input('Endereco.bairro', array(
												'id' => 'bairro', 
												'label' => '',
												'class' => 'form-control'
											)); 
										?>
									</div>
									<br />		
									<div class="input-group">
										<span class="input-group-addon">Logradouro </span>
										<?php 
											echo $this->Form->input('Endereco.logradouro', array(
												'id' => 'logradouro', 
												'label' => '',
												'class' => 'form-control'
											)); 
										?>
									</div>
									<br />
									<div align = "left" style="width: 250px; float: left;">
										<div class="input-group">
											<span class="input-group-addon">Número &nbsp &nbsp </span>
											<?php 
												echo $this->Form->input('Endereco.numero_endereco', array(
													'label' => '',
													'class' => 'form-control'
												));
											?>
										</div>		
									</div>
									<div align = "left" style="width: 398px; margin-left: 299px;">
										<div class="input-group">
											<span class="input-group-addon">Complemento </span>
											<?php 
												echo $this->Form->input('Endereco.complemento', array(
													'label' => '',
													'class' => 'form-control'
												));
											?>
										</div>		
									</div>
									<br /> <br />
									<div align = "left">
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

		document.getElementById('uf').value=valor.uf
	    document.getElementById('localidade').value=valor.localidade
	    document.getElementById('bairro').value=valor.bairro
	    document.getElementById('logradouro').value=valor.logradouro
	}
		
	function addCampo() 
	{
		document.getElementById("duplicaCampo").innerHTML += "<input type='text' name='campo[]' />";
	}

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
			document.getElementById('label').color = 'red';
	}
</script>

