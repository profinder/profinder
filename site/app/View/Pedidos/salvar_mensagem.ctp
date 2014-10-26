<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<?php
	$anuncios[]=$this->Session->read('anuncios');
	$mensagem = $_POST['mensagem'];
	$contador=0;
	App::import('Controller', 'Pedidos');
	$pedidos = new PedidosController;
	$pedidos->constructClasses();
	$cliente_id=AuthComponent::user("id");
	
	while($contador<sizeof($anuncios[0][0]))
	{
		$pedidos->salvarPedido($cliente_id, $anuncios[0][0][$contador]);
		$pedidosResultado=$pedidos->idPedido($cliente_id, $anuncios[0][0][$contador]);
		$pedidos->salvarMensagem($pedidosResultado[0]['tb_pedido']['id'], $mensagem);
		
		$contador++;
	}
?>

<div class="main">
	<div class="wrap">
		<div class="content-top">
			<div class="top-box">
				
				<h4> Seu pedido foi solicitado com sucesso! </h4>
				<center><hr></center>
				<br />
				Para acessar sua página de pedidos, clique <a href = "/profinder/site/pedidos/clientePedidos">aqui</a>
			</div>
		</div>
	</div>
</div>

</body>
</html>
