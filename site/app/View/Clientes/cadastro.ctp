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
				
				<div class = "panel panel-default" style="height: 250px; width: 590px; float: left;">
					<h4> Dados Pessoais </h4>
					<br />
					<div style="float: left; margin-left: 10px">
						Nome <br /><br />
						
						E-mail <br /><br />
						
						Senha <br /><br />
						
						
					</div>
					
					<div style="float: left; margin-left: 30px">
						<?php 
							echo $this->Form->input('nome_pessoa', array (
								'type' => 'text',
								'label' => '',
								'style' => 'width:300px; height:20px; resize:none;' 
							));
						?>	
						<br />
						<?php 
							echo $this->Form->input('username', array (
								'type' => 'text',
								'label' => '',
								'style' => 'width:300px; height:20px; resize:none;',
								'placeholder' => 'email@email.com', 
								'type' => 'email' 
							));
						?>	
						<br />
						<?php 
							echo $this->Form->input('password', array (
								'label' => '',
								'style' => 'width:300px; height:20px; resize:none;'
							));
							echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'cliente'));
						?>	
					</div>
				</div>
				<div class = "panel panel-default" style="height: 250px; width: 590px; float: left; margin-left: 15px;">
					<h4> Telefones </h4>
					<br />
					<div style="float: left; margin-left: 10px">
						1: <br /><br />
						
						2: <br /><br />
						
						3: <br /><br />
						
						
					</div>
					<div style="float: left; margin-left: 15px">
						<?php 
							echo $this->Form->input('Telefone.0.ddd_telefone', array (
								'type' => 'text',
								'label' => 'DDD &nbsp',
								'style' => 'width:30px; height:20px; resize:none;' 
							));
						?>
						<br />
						<?php 
							echo $this->Form->input('Telefone.1.ddd_telefone', array (
								'type' => 'text',
								'label' => 'DDD &nbsp',
								'style' => 'width:30px; height:20px; resize:none;' 
							));
						?>
						<br />
						<?php 
							echo $this->Form->input('Telefone.2.ddd_telefone', array (
								'type' => 'text',
								'label' => 'DDD &nbsp',
								'style' => 'width:30px; height:20px; resize:none;' 
							));
						?>
					</div>
					<div style="float: left; margin-left: 45px">
						<?php 
							echo $this->Form->input('Telefone.0.numero_telefone', array (
								'type' => 'text',
								'label' => 'Número &nbsp',
								'style' => 'width:100px; height:20px; resize:none;' 
							));
						?>
						<br />
						<?php 
							echo $this->Form->input('Telefone.1.numero_telefone', array (
								'type' => 'text',
								'label' => 'Número &nbsp',
								'style' => 'width:100px; height:20px; resize:none;' 
							));
						?>
						<br />
						<?php 
							echo $this->Form->input('Telefone.2.numero_telefone', array (
								'type' => 'text',
								'label' => 'Número &nbsp',
								'style' => 'width:100px; height:20px; resize:none;' 
							));
						?>
					</div>
					<div style="float: left; margin-left: 70px">
						<?php 
							echo $this->Form->input('Telefone.0.tipo_telefone', array(
								'label' => 'Tipo &nbsp', 
								'style' => 'width:130px; height:20px; resize:none;',
								'options' => array(
									'' => '',
									'residencial' => 'Residencial',
									'celular' => 'Celular',
									'escritorio' => 'Escritório'))
							);
						?>
						<br />
						<?php 
							echo $this->Form->input('Telefone.1.tipo_telefone', array(
								'label' => 'Tipo &nbsp', 
								'style' => 'width:130px; height:20px; resize:none;',
								'options' => array(
									'' => '',
									'residencial' => 'Residencial',
									'celular' => 'Celular',
									'escritorio' => 'Escritório'))
							);
						?>
						<br />
						<?php 
							echo $this->Form->input('Telefone.2.tipo_telefone', array(
								'label' => 'Tipo &nbsp', 
								'style' => 'width:130px; height:20px; resize:none;',
								'options' => array(
									'' => '',
									'residencial' => 'Residencial',
									'celular' => 'Celular',
									'escritorio' => 'Escritório'))
							);
						?>
					</div>					
				</div>
				<div class = "panel panel-default" style="height: 500px; width: 1194px; float: left;">
				 	<h4> Endereço </h4>
				 	<br />
				 	<div align = "left" style="float: left; margin-left: 10px">
						CEP: <br /><br />
						
						Logradouro: <br /><br />
						
						Cidade: <br /><br />
						
						Bairro: <br /><br />
						
						Estado: <br /><br />
						
						Número: <br /><br />
						
						Complemento: <br /><br />
					</div>
					<div style="float: left; margin-left: 30px">
					
					</div>
					
				 </div>
				 
				<table width = "1200" height = "600">
					<tr>
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
