<?php 
	$username=$_POST['username'];
	App::import('Controller', 'Clientes');
	$cliente = new ClientesController;
	$cliente->constructClasses();
	$enviar_email=$cliente->email($username);
	
?>