<?php
 
if( $_SERVER['REQUEST_METHOD']=='POST' ){
	$id_produto = (int)getPost('id_produto');
	$voto = (int)getPost('voto');
 
	App::import('Controller', 'Avaliacaos');
	$avalicao = new AvaliacaosController;
	$avalicao->constructClasses();
	$sqlavaliaco=$avalicao->salvarAvaliacao($voto);
	$sql = "INSERT INTO tb_avaliação (`id_anuncio`, `nota_avaliacao`) VALUES ( '1', {$voto} )";
	echo $sql;
}
 
 
function getPost( $key ){
	return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;
}
function filter( $str ){
	return addslashes( $str );//a cargo do leitor
}