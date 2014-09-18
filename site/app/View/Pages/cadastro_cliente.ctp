<link rel="stylesheet" href="css/bootstrap.css"/>
<link href="/profinder/site/css/style2.css" rel="stylesheet" type="text/css" media="all" />
<div class="header">
	<div class="wrap">
		<div class="header-top">
			<div class="logo">
				<a href="/profinder/site"><img src="/profinder/site/img/logo1.png"
					height="70" width="338" style="padding-top: 0px"> </a>
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
					<center>
					<table border="1" width="500" height="500">
						<tr>
							<td> Nome </td>
							<td><?php echo $this->Form->input('nome_pessoa', array('label' => ''));?></td>
							<td></td>
							<td>DDD</td>
							<td><?php echo $this->Form->input('Telefone.0.ddd_telefone',array('label' => ''));?></td> 
						
						</tr>
						<tr>
							<td> Login </td>
							<td><?php echo $this->Form->input('username', array('label' => ''));?></td>
							<td></td>
							<td> Número </td>
							<td><?php echo $this->Form->input('Telefone.0.numero_telefone', array('label' => ''));?> </td>
						
						</tr>
						<tr>
							<td> Senha </td>
							<td><?php echo $this->Form->input('password', array('label' => ''));
										echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'cliente'));?></td>
							<td></td>
							<td> Tipo do telefone </td>
							<td> <?php 
							echo $this->Form->input('Telefone.0.tipo_telefone', array('label' => '',
										'options' => array(
											'residencial' => 'Residencial',
											'comercial' => 'Comercial',
											'celular' => 'Celular')));	?></td>
						</tr>
						<tr>
							<td>CEP</td>
							<td> <?php echo $this->Form->input('Endereco.cep', array('id' => 'cep', 'onblur' => 'consultacep(this.value)', 'label' => '')); ?></td>
						</tr>
						<tr>
							<td>Logradouro</td>
							<td><?php echo $this->Form->input('Endereco.logradouro', array('id' => 'logradouro', 'label' => ''));?></td>
						</tr>
						<tr>
							<td> Cidade</td>
							<td> <?php echo $this->Form->input('Endereco.localidade', array('id' => 'localidade', 'label' => ''));?> </td>
						</tr>
						<tr>
							<td>Bairro</td>
							<td> <?php echo $this->Form->input('Endereco.bairro', array('id' => 'bairro', 'label' => ''));?></td>
						</tr>
						<tr>
							<td>Estado</td>
							<td> <?php echo $this->Form->input('Endereco.uf', array('id' => 'uf', 'label' => ''));?></td>
						</tr>
						
						<tr>
							<td>Número</td>
							<td> <?php echo $this->Form->input('Endereco.numero_endereco', array('label' => ''));?></td>
						</tr>
						
						<tr>
							<td>Complemento</td>
							<td> <?php echo $this->Form->input('Endereco.complemento', array('label' => ''));?></td>
						</tr>
						
						<tr>
						</tr>
					</table>
					</center>
						<?php
			//echo $this->Form->create('Telefone', array('action' => 'add'));
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
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
</div>
<script>
	    function consultacep(cep){
	      cep = cep.replace(/\D/g,"")
	      url="http://cep.correiocontrol.com.br/"+cep+".js"
	      s=document.createElement('script')
	      s.setAttribute('charset','utf-8')
	      s.src=url
	      document.querySelector('head').appendChild(s)
	    }
	 
	    function correiocontrolcep(valor){
	      if (valor.erro) {
	        alert('Cep não encontrado');       
	        return;
	      };
	      document.getElementById('logradouro').value=valor.logradouro
	      document.getElementById('bairro').value=valor.bairro
	      document.getElementById('localidade').value=valor.localidade
	      document.getElementById('uf').value=valor.uf
		}
		
		function addCampo() {
			document.getElementById("duplicaCampo").innerHTML += "<input type='text' name='campo[]' />";
		}
	
	    </script>
