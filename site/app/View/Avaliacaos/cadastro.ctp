<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
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
</head>
<body>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">	
				
				<h2>Avalie este serviço</h2>
				
				<ul id="produtos">
					<li>
						<ol class="stars"><li></li><li></li><li></li><li></li><li></li></ol>
						<input type="hidden" name="id_produto[]" value="15" />
					</li>
				</ul>
				
				<?php
					App::import('Controller', 'Avaliacaos');
					$avalicao = new AvaliacaosController;
					$avalicao->constructClasses();
					$sqlavaliacao=$avalicao->buscarAvaliacao('3');
					var_dump($sqlavaliacao[0]['tb_avaliacao']['nota_avaliacao']);
					$sql=$sqlavaliacao[0]['tb_avaliacao']['nota_avaliacao'];
					?>
					<ul id="produtos">
					<li>
						<ol class="stars"><li></li><li></li><li></li><li></li><li></li></ol>
					</li>
				</ul>
			 
				<div id="sql"></div>
					
						
			 	</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Mensagem</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('Pedido', array('action' => 'add'));
			echo $this->Form->input('Mensagem.0.texto_mensagem', array('label' => 'Mensagem:'));
			echo $this->Form->input('Pedido.cliente_id', array('type' => 'hidden', 'value' => AuthComponent::user("id")));
			echo $this->Form->input('Pedido.status_pedido', array('type' => 'hidden', 'value' => 'andamento'));
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('controller' => 'Pages','action' => 'solicitar_pedido'),
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Pedidos','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		?>
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
			url: "retorno_votacao.php",
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

