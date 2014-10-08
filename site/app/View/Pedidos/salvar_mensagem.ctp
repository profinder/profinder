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