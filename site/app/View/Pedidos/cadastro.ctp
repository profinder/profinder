<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
				
				<?php
					
					$anuncios[]=$_POST["anuncio"];
				 	//var_dump($anuncios);
					App::import('Controller', 'Pedidos');
					$pedidos = new PedidosController;
					$pedidos->constructClasses();
					$pedidos->criarSessao($anuncios);
				?>
					<form action="/profinder/site/pedidos/salvar_mensagem" id="idMensagem" method="post" accept-charset="utf-8">
						<div class="top-box">
						
							<h4> Envie uma mensagem para esses profissionais </h4>
							<hr><br /><br /><br /><br />
							<div align = "left" style = "margin-left: 100px">
								<li>Descreva melhor o serviço que deseja</li>
							</div>
							<br /><br />
								<div class="panel-body">
									<textarea name='mensagem' style = 'width:1000px; height:133px; resize:none;' placeholder='Digite aqui uma mensagem para os profissionais'></textarea>
									
								</div>
							
						</div>
	            		<button type="submit" class="btn btn-info">Enviar Mensagem</button>
					</form>		
				 	
							
			 	</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do UsuÃ¡rio</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('User', array('action' => 'add'));
			echo $this->Form->input('nome_pessoa', array('label' => 'Nome:'));
			echo $this->Form->input('username', array('label' => 'E-mail:'));
			echo $this->Form->input('password', array('label' => 'Senha:'));
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Users','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
</div>

<script>

	function receberMensagem(mensagem)
	{
		alert(mensagem)
		var mensagemjs = mensagem;
	}

</script>
	