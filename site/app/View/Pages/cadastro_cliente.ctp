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
					<table class="table">
					<?php
						echo $this->Form->create('Cliente', array('action' => 'add'));
        	//echo $this->Form->create('Endereco', array('action' => 'add'));
     	   echo $this->Form->input('Endereco.cep', array('id' => 'cep', 'onblur' => 'consultacep(this.value)'), array('label' => 'CEP '));
        	echo $this->Form->input('Endereco.logradouro', array('id' => 'logradouro', 'label' => 'Rua '));
        	echo $this->Form->input('Endereco.localidade', array('id' => 'localidade', 'label' => 'Cidade '));
        	echo $this->Form->input('Endereco.bairro', array('id' => 'bairro', 'label' => 'Bairro '));
        	echo $this->Form->input('Endereco.uf', array('id' => 'uf', 'label' => 'Estado '));
        	?>
					</table>
						
			<?php 
			echo $this->Form->input('nome_pessoa', array('default' => 'oi', 'label' => 'Nome '));
			?>
			<div class="input-group">
				<span class="input-group-addon">E-mail</span>
				<?php
				echo $this->Form->input('username', array('class' => 'form-control', 'label' => ''));
				?>
			</div>
			<?php 
			echo $this->Form->input('password', array('default' => 'oi', 'label' => 'Senha '));
			echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'cliente'));
			
			
			//echo $this->Form->create('Telefone', array('action' => 'add'));
			echo $this->Form->input('Telefone.0.ddd_telefone',array('label' => 'DDD'));
			
			echo $this->Form->input('Telefone.0.numero_telefone', array('label' => 'Telefone '));
			$options = array();
			array_push($options, 'Celular', 'Residencial', 'Comercial');
			echo "Tipo telefone ";
			echo $this->Form->select('Telefone.0.tipo_telefone',$options);

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
