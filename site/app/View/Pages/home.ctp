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
              							type="text" id="UserUsername" required="required" placeholder="Email"/>
            					</div>
            					<div class="form-group">
            						<input name="data[User][password]" placeholder="Password" type="password"
            							id="UserPassword" required="required" class="form-control"/>
            					</div>
            					<button type="submit" class="btn btn-success">Entrar</button>
          				</form>
			
	    				<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModalCliente">Cadastro cliente</button>
	    				<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModalProfissional">Cadastro Profissional</button>
	    			
	    				<br/>
	    				
	    				</div>
		 			<div class="clear"></div> 
	   			</div>
   			</div>	
		</div>
    
	<div class="banner">
    	<div class="wrap">
			<div class="cssmenu">
				<?php
					App::import('Controller', 'Pages');
					$pages = new PagesController;
					$pages->constructClasses();
					$categorias=$pages->nomeCategorias();
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
								?>
								<li><a href="#"><?php echo $servicos[$contadorServicos]['Servico']['nome_servico'] ?></a></li>
								<?php
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
			<div class="slider">
		 		<div class="slider-wrapper theme-default">
		            <div id="slider" class="nivoSlider">
		                
		                <img src="img/pedreiro.jpg" alt="" />
		                <img src="img/empregada-domestica.jpg" alt="" />
		                <img src="img/dj.jpg" alt="" />
		                <img src="img/jardineira.jpg" alt="" />
		                
		                </div>
		             </div>
			</div>
		</div>
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
						<h3>1. Conte-nos o que voc� precisa</h3>
						<p>Responda algumas perguntas que v�o nos ajudar a encontrar os melhores profissionais para voc�.</p>
					</div>
					<div class="col_1_of_5 span_1_of_5">
						<div class="grid_img">
							<img src="img/profinder.png" alt=""/>
						</div>
						<h3>2. Encontre at� 7 profissionais</h3>
						<p>N�s pesquisamos at� 7 profissionais pr�ximos � sua regi�o e te indicamos em at� 24 horas.</p>
					</div>
					<div class="col_1_of_5 span_1_of_5">
						<div class="grid_img">
							<img src="img/profinder.png" alt=""/>
						</div>
						<h3>3. Compare e contrate o melhor</h3>
						<p>Voc� compara os or�amentos e avalia��es dos profissionais, negocia e contrata o melhor profissional.</p>
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
		</div>
	   </div>
	</div>
	
</body>
<!-- Modal -->
<div class="modal fade" id="myModalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Novo Usuário</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('Endereco', array('action' => 'add'));
			echo $this->Form->input('Cliente.nome_pessoa', array('label' => 'Nome: '));
			echo $this->Form->input('Cliente.username', array('label' => 'E-mail: '));
			echo $this->Form->input('Cliente.password', array('label' => 'Senha: '));
			echo $this->Form->input('Cliente.role', array('type' => 'hidden', 'default' => 'cliente'));
			
			echo "Dados do endereço: ";
			echo $this->Form->input('Endereco.cep', array('id' => 'cep', 'onblur' => 'consultacep(this.value)', 'label' => 'CEP: '));
			echo $this->Form->input('Endereco.logradouro', array('id' => 'logradouro', 'label' => 'Logradouro: '));
			echo $this->Form->input('Endereco.localidade', array('id' => 'localidade', 'label' => 'Cidade: '));
			echo $this->Form->input('Endereco.bairro', array('id' => 'bairro', 'label' => 'Bairro: '));
			echo $this->Form->input('Endereco.uf', array('id' => 'uf', 'label' => 'Estado: '));
			echo $this->Form->input('Endereco.numero_endereco', array('label' => 'Número: '));
			echo $this->Form->input('Endereco.complemento', array('Label' => 'Complemento: '));
			
			/*echo $this->Form->input('Telefone.0.ddd_telefone');
			echo $this->Form->input('Telefone.0.numero_telefone');
			echo $this->Form->input('Telefone.0.tipo_telefone');
			*/
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


<div class="modal fade" id="myModalProfissional" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar Profissional</h4>
      </div>
      <div class="modal-body">
      	
        <?php
        
			echo $this->Form->create('Profissional', array('action' => 'add'));
			echo $this->Form->input('Profissional.nome_pessoa', array('label' => 'Nome: '));
			echo $this->Form->input('Profissional.username', array('label' => 'E-mail: '));
			echo $this->Form->input('Profissional.password', array('label' => 'Senha: '));
			echo $this->Form->input('Profissional.role', array('type' => 'hidden', 'default' => 'profissional'));
			
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

</html>


    	
    	
            