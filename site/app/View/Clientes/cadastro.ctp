<link rel="stylesheet" href="css/bootstrap.css"/>
<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />

<div class="header">
	<div class="wrap">
		<div class="header-top">
			<div class="logo">
				<center><a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style="padding-top: 0px"> </a></center>
			</div>
		</div>
		<center><hr></center>
	</div>
</div>

<div class="main">					
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				<?php
					echo $this->Form->create('Cliente', array('action' => 'cadastro'));	
				?>
				
				<table width = "1200" height = "600">
					<tr>
						<td>
							<div class="panel panel-default">
							
								<table width = "550" height = "400">
									<tr>
										<td>
											<h4>Dados Pessoais</h4>
											<br />
										</td>
									</tr>
									
									<tr>
										<td>
											<?php 
												echo $this->Form->input('nome_pessoa', array (
													'type' => 'text',
													'label' => '&nbsp Nome &nbsp &nbsp',
													'style' => 'width:300px; height:25px; resize:none;' 
												));
											?>	
										</td>											
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('username', array (
													'type' => 'text',
													'label' => '&nbsp Email &nbsp &nbsp',
													'style' => 'width:300px; height:25px; resize:none;',
													'placeholder' => 'email@email.com', 
													'type' => 'email'
												));
											?>	
										</td>											
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('password', array (
													'type' => 'text',
													'label' => '&nbsp Senha &nbsp ',
													'style' => 'width:300px; height:25px; resize:none;' 
												));
												echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'cliente'));
											?>	
											
										</td>											
									</tr>
									
									
								</table>
							</div>
						</td>
						<td>
						&nbsp
						</td>
						<td>
							<div class="panel panel-default">
								<table width = "550" height = "400">
									<tr>
										<td>
											<h4>Endereço</h4>
											<br />
										</td>
									</tr>
									
									<tr>
										<td>
											<?php 
												echo $this->Form->input('Endereco.cep', array(
													'id' => 'cep', 
													'onblur' => 'consultacep(this.value)', 
													'label' => 'CEP &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp',
													'style' => 'width:300px; height:25px; resize:none;'
												)); 
											?>	
										</td>											
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('Endereco.logradouro', array(
													'id' => 'logradouro', 
													'label' => 'Logradouro &nbsp &nbsp &nbsp',
													'style' => 'width:300px; height:25px; resize:none;'
												));
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('Endereco.localidade', array(
													'id' => 'localidade', 
													'label' => 'Cidade &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ',
													'style' => 'width:300px; height:25px; resize:none;'
												));
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('Endereco.bairro', array(
													'id' => 'bairro', 
													'label' => 'Bairro &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ',
													'style' => 'width:300px; height:25px; resize:none;'
												));
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('Endereco.estado', array(
													'id' => 'uf', 
													'label' => 'Estado &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp',
													'style' => 'width:300px; height:25px; resize:none;'
												));
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('Endereco.numero_endereco', array(
													'label' => 'Número &nbsp &nbsp &nbsp &nbsp &nbsp',
													'style' => 'width:300px; height:25px; resize:none;'
												));
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php 
												echo $this->Form->input('Endereco.complemento', array(
													'label' => '&nbsp Complemento &nbsp &nbsp',
													'style' => 'width:300px; height:25px; resize:none;'
												));
											?>
										</td>
									</tr>
								</table>
							</div>
						</tr>
					</table>
					<table>
						<tr>
							<td>
								<div class="panel panel-default">
									<table width = "400" height = "400">
										<tr>
											<td>
												<h4>Telefone</h4>
												<br />
											</td>
										</tr>
										
										<tr>
											<td>
											<?php 
												echo $this->Form->input('Telefone.0.ddd_telefone', array (
													'type' => 'text',
													'label' => '&nbsp DDD &nbsp',
													'style' => 'width:30px; height:25px; resize:none;' 
												));
											?>
										</td>
										<td>
											<?php 
												echo $this->Form->input('Telefone.0.numero_telefone', array (
													'type' => 'text',
													'label' => 'Número &nbsp &nbsp',
													'style' => 'width:70px; height:25px; resize:none;' 
												));
											?>
										</td>
										<td>
											<?php 
												echo $this->Form->input('Telefone.0.tipo_telefone', array(
													'label' => 'Tipo', 
													'style' => 'width:100px; height:25px; resize:none;',
													'options' => array(
														'' => '',
														'residencial' => 'Residencial',
														'celular' => 'Celular',
														'escritorio' => 'Escritório',))
												);
											?>
										</td>									
									</tr>
										
										<tr>
											<td>
											<?php 
												echo $this->Form->input('Telefone.0.ddd_telefone', array (
													'type' => 'text',
													'label' => '&nbsp DDD &nbsp',
													'style' => 'width:30px; height:25px; resize:none;' 
												));
											?>
										</td>
										<td>
											<?php 
												echo $this->Form->input('Telefone.0.numero_telefone', array (
													'type' => 'text',
													'label' => 'Número &nbsp &nbsp',
													'style' => 'width:70px; height:25px; resize:none;' 
												));
											?>
										</td>
										<td>
											<?php 
												echo $this->Form->input('Telefone.0.tipo_telefone', array(
													'label' => 'Tipo', 
													'style' => 'width:100px; height:25px; resize:none;',
													'options' => array(
														'' => '',
														'residencial' => 'Residencial',
														'celular' => 'Celular',
														'escritorio' => 'Escritório',))
												);
											?>
										</td>									
									</tr>
										
										<tr>
											<td>
											<?php 
												echo $this->Form->input('Telefone.0.ddd_telefone', array (
													'type' => 'text',
													'label' => '&nbsp DDD &nbsp',
													'style' => 'width:30px; height:25px; resize:none;' 
												));
											?>
										</td>
										<td>
											<?php 
												echo $this->Form->input('Telefone.0.numero_telefone', array (
													'type' => 'text',
													'label' => 'Número &nbsp &nbsp',
													'style' => 'width:70px; height:25px; resize:none;' 
												));
											?>
										</td>
										<td>
											<?php 
												echo $this->Form->input('Telefone.0.tipo_telefone', array(
													'label' => 'Tipo', 
													'style' => 'width:100px; height:25px; resize:none;',
													'options' => array(
														'' => '',
														'residencial' => 'Residencial',
														'celular' => 'Celular',
														'escritorio' => 'Escritório',))
												);
											?>
										</td>									
									</tr>
										
									</table>
								</div>
						</tr>
				</table>
				</div>
			</div>
		</div>	
		<?php 
			echo "<center>";
			echo $this->Form->button(
				$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-floppy-saved'))." Salvar",
				array('type' => 'submit', 'class' => 'btn btn-default', 'escape' => false)
			);
			echo " ";
			echo $this->Html->link(
				$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
				array('controller' => 'Clientes','action' => 'index'),
				array('role' => 'button', 'class' => 'btn btn-default', 'escape' => false)
			);	
			echo " ";
			echo $this->Form->button(
				$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil'))." Limpar",
				array('type' => 'reset', 'class' => 'btn btn-default', 'escape' => false)
			);	
			echo "</center>";
			echo $this->Form->end();
		?>

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
