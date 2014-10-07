<?php echo $this->Session->flash('auth'); ?>
   
<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

	<!------ Slider ------------>
	
	<div class="header">	
  		<div class="wrap"> 
			<div class="header-top">
		 		<div class="logo">
			 		<a href="/profinder/site"><img src="/profinder/site/img/logo1.png" height="80" width="387" style= "padding-top:0px"> </a>
		 		</div>
	    		<div id="text-6" class="visible-all-devices header-text ">	
	     			<div class="navbar-collapse collapse">
        				<form action="/profinder/site/users/login" id="UserLoginForm" method="post" accept-charset="utf-8"
        					class="navbar-form navbar-right" role="form">
        					<input type="hidden" name="_method" value="POST"/>
            					<div class="form-group">
              						<input name="data[User][username]" class="form-control" maxlength="50"
              							type="text" id="UserUsername" required="required" placeholder="E-mail"/>
            						
            					</div>
            					<div class="form-group">
            						<input name="data[User][password]" placeholder="Senha" type="password"
            							id="UserPassword" required="required" class="form-control"/>
            					</div>
            					<button type="submit" class="btn btn-success">Entrar</button>
          						
          				</form>
			
	    				<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Esqueci minha senha</button>
	    				
	    				<br/>
	    				
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
			
			
			<div class="slider">
			
		 		<div class="slider-wrapper theme-default">
		 		    <div id="slider" class="nivoSlider">
		                
		                <img src="img/pedreiro.jpg" alt="" />
		                <img src="img/empregada-domestica.jpg" alt="" />
		                <img src="img/dj.jpg" alt="" />
		                <img src="img/jardineira.jpg" alt="" />
		                
		                </div>
		                
		                <br />
		     
		             </div>
		   </div>
		</div>
		
	</div>
	<div style="position:absolute; border: 5px solid white; background-color:#FFF; height: 100px; width: 600px; float: left; top:110px; left:6px; margin-left: 70px;">
		</div>
  	<!------End Slider ------------>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<h2>Como Funciona o ProFinder</h2>
						<hr>
						<p>Aqui você encontra o profissional para o serviço que você precisa! </p>
			 	</div>
			 	<div class="top-box">
			 		<p><a href = "/profinder/site/clientes/cadastro">Cadastro de Cliente</a>
			 		<hr>
			 		<p><a href = "/profinder/site/profissionals/cadastro">Cadastro de Profissional</a>
		    	</p>
			 	</div>
			 	
			 	<div class="section group">
		    	<div class="col_1_of_5 span_1_of_5">
					<div class="grid_img">
					 		<img src="img/find.png" alt=""/>
						</div>
						<h3>1.Pesquise o serviço desejado</h3>
						<p>Os profissionais estão separados por categorias de serviço</p>
					</div>
					<div class="col_1_of_5 span_1_of_5">
						<div class="grid_img">
							<img src="img/profinder.png" alt=""/>
						</div>
						<h3>1. Conte-nos o que você precisa</h3>
						<p>Responda algumas perguntas que vão nos ajudar a encontrar os melhores profissionais para você.</p>
					</div>
					<div class="col_1_of_5 span_1_of_5">
						<div class="grid_img">
							<img src="img/profinder.png" alt=""/>
						</div>
						<h3>2. Encontre até 7 profissionais</h3>
						<p>Nós pesquisamos até 7 profissionais próximos à sua região e te indicamos em até 24 horas.</p>
					</div>
					<div class="col_1_of_5 span_1_of_5">
						<div class="grid_img">
							<img src="img/profinder.png" alt=""/>
						</div>
						<h3>3. Compare e contrate o melhor</h3>
						<p>Você compara os orçamentos e avaliações dos profissionais, negocia e contrata o melhor profissional.</p>
					</div>
					<div class="col_1_of_5 span_1_of_5">
						<div class="grid_img">
							<img src="img/profinder.png" alt=""/>
						</div>
						<h3>4. ProFinder</h3>
						<p>ProFinder</p>
					</div>

				<div class="clear"></div>
			</div>
		</div>
		
				<div class="clear"></div>
			</div>
		</div>
		
				<div class="clear"></div>
			</div>
		
</body>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Usuário</h4>
      </div>
      <div class="modal-body">
      	
        <?php

        	//echo $this->Form->Create('User', array('action' => 'send_email'));
        	echo $this->Form->Create('Cliente', array('action' => 'email'));
			echo $this->Form->input('username', array('label' => 'E-mail:'));
			
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




</html>


    	
    	
            