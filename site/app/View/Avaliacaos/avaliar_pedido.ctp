<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>

<style type="text/css">
	* { margin: 0; padding: 0; list-style: none; }
	.stars {
		width: 100px;
		height: 20px;
		margin: 5px auto 0 auto;
	}
	#produtos .stars li {
		background: url('/profinder/site/img/star_groups.jpg') no-repeat;
		display: block;
		height: 20px;
		width: 20px;
		cursor: pointer;
		float: left;
	}
	#produtos .stars li.active {
		background-position: left -45px;
	}
	#produtos {
		width: 450px;
		margin: 20px auto 0 auto;
	}
	#produtos li {
		float: left;
		width: 150px;
		height: 200px;
		color: #1B57A3;
		text-align: center;
	}
	#produtos p {
		text-decoration: underline;
		font: 12px Arial, Verdana, sans-serif;
	}
	#sql {
		font: bold 20px Arial;
		color: #f00;
		text-align: center;
		clear: both;
	}
</style>
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
		                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                		Opções LOGADO: <?php echo AuthComponent::user("id"); ?>
		                		<b class="caret"></b>
		                	</a>
							<ul class="dropdown-menu">
			               		<li><a href="/profinder/site/pages/perfilProfissional">Perfil</a></li>
			               		<li><a href="/profinder/site/pages/anunciosProfissional">Meus anúncios</a></li>
			               		<li><a href="#">Notificações</a></li>
			               		<li class="divider"></li>
								<li><a href="/profinder/site/users/delete">Remover Conta</a></li>
			               		<li><a href="/profinder/site/users/logout">Sair</a></li>

		               		</ul>
						</li>
					</ul>
        				
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
		</div>
	</div>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">	
				
				<h2>Avalie este serviço</h2>
				
				<ul id="produtos">
					<li>
						<ol class="stars"><li></li><li></li><li></li><li></li><li></li></ol>
					</li>
				</ul>
			 
			 	<?php
					$id_pedido=$_POST["id_pedido"];
			 		App::import('Controller', 'Avaliacaos');
					$avalicao = new AvaliacaosController;
					$avalicao->constructClasses();
					//$sqlavaliacao=$avalicao->buscarAvaliacao($id_pedido);
					//var_dump($sqlavaliacao[0]['tb_avaliacao']['nota_avaliacao']);
					$sql = $sqlavaliacao[0]['tb_avaliacao']['nota_avaliacao'];
					$sql = $sqlavaliacao[0]['tb_avaliacao']['pedido_id'];
				?>
			 
				<div id="sql"></div>
						
			 	</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.stars li').click(function(){
		var $this = $( this );
		var ol = $this.parent('ol');
		var rating = $this.index()+1;
		var id_produto = ol.parent('li').find("input[name='id_produto[]']").val();
 
 
		if( $this.hasClass('active') && !$this.next('li').hasClass('active') ){
			$( ol ).find('li').removeClass('active');
			rating = 0;
		}
		else{
			$( ol ).find('li').removeClass('active');
			for( var i=0; i<rating; i++ ){
				$( ol ).find('li').eq( i ).addClass('active');
			};
		}
 
		$.ajax({
			type: "POST",
			url: "/profinder/site/pages/retorno_votacao.php",
			data: "id_produto="+id_produto+"&voto="+rating,
			success: function( data ){
				$('#sql').html( data );
			}
		});
	});
});

function mostraravaliaco(nota){
	alert(nota)
	$( ol ).find('li').removeClass('active');
			for( var i=0; i<nota; i++ ){
				$( ol ).find('li').eq( i ).addClass('active');
			};
}
</script>

