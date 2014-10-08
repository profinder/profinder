<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
	
<div class="header">	
	<div class="wrap"> 
		<div class="header-top">
	 		<div class="logo">
		 		<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="70" width="338" style= "padding-top:0px"> </a>
	 		</div>
    		<div id="text-6" class="visible-all-devices header-text ">	
				<div class="navbar-collapse collapse">
        				
        			<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
		                <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                	<span class="glyphicon glyphicon-cog"></span>
			                		Opções LOGADO: <?php echo AuthComponent::user('id'); ?>
			                		<b class="caret"></b>
			                	</a>
							<ul class="dropdown-menu">
								<li><a href="/profinder/site/clientes/perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
			               		<li><a href="/profinder/site/pedidos/clientePedidos">Meus pedidos</a></li>
								<li><a href="/profinder/site/pedidos/clientePedidosAvaliar">Meus pedidos disponíveis para avaliar</a></li>
			               		<li><a href="/profinder/site/pedidos/clienteSolicitacaoFinalizarPedido">Solicitações de finalizar pedido</a></li>
			               		<li class="divider"></li>
								<li><a href="/profinder/site/users/delete"><span class="glyphicon glyphicon-remove"></span> Remover Conta</a></li>
			               		<li><a href="/profinder/site/users/logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>

		               		</ul>
						</li>
					</ul>
					
					
        				
				</div>
		 		
		 		<div class="clear"></div> 
	   		</div>
   		</div>	
	</div>
    
	<form id = "formulario" action = "anuncios/anuncios" method = "post">
	<div class="banner">
    	<div class="wrap">
			<div class="cssmenu">
				<?php
					App::import('Controller', 'Pages');
					$pages = new PagesController;
					$pages->constructClasses();
					$categorias=$pages->nomeCategorias();
					//$pages->email('uuu');
					$contador=0;
				?>
				<ul>
				
					<?php
						while($contador<sizeof($categorias))
						{
					?>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $categorias[$contador]['Categoria']['nome_categoria'] ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php
									$servicos=$pages->nomeServicos($categorias[$contador]['Categoria']['id']);
									$contadorServicos=0;
									while($contadorServicos<sizeof($servicos))
									{
										$id_servico = $servicos[$contadorServicos]['Servico']['id'];
										$nome_servico = $servicos[$contadorServicos]['Servico']['nome_servico']; 
								/*<li><a href = "/profinder/site/anuncios/anuncios?serv=".<?php echo $id_servico;?>><?php echo $servicos[$contadorServicos]['Servico']['nome_servico']; ?></a></li>
								*/
								echo "<li><a href = '/profinder/site/anuncios/anuncios?serv=".$id_servico;
								echo "'>$nome_servico</a></li>";
								
								/*echo "<a href = '/Loja/clienteForm.php?usr=".$row['id_cliente'];
								echo "'>Editar</a> ";
				
								<?php*/
									$contadorServicos++;
						}
					?>
							</ul>
							<?php
						$contador++;
					}
							?>
					<div class="clear"></div> 
				</ul>
			</div>
			</form>
		</div>
	</div>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<h2>Pedidos</h2>
					<hr></hr>
					
						<p>Aqui você encontra o profissional para o serviço que você precisa! </p>
			
							
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
	
	