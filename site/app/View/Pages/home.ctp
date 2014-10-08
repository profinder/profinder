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
  		
	</div>
		
	<form id = "formulario" action = "anuncios/anuncios" method = "post">
	<div class="banner">
    	<div class="wrap">
			
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
	<?php /*<div style="position:absolute; border: 5px solid white; background-color:#FFF; height: 100px; width: 600px; float: left; top:110px; left:6px; margin-left: 70px;">
		</div> */ ?>
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
      	
        

        	<form id = "formEmail" action = "/profinder/site/clientes/enviar_email" method = "post">
			<input type='text' name='username'>
				
			<button type="submit" class="btn btn-default">Solicitar Senha</button>
			</form>
      </div>
    </div>
  </div>
</div>

</html>
    	
            