<?php
class Foto extends AppModel
{
	public $useTable = 'tb_foto';
	
	public $belongsTo = array(
			'Anuncio' => array(
					'className' => 'Anuncio',
					'foreignKey' => 'anuncio_id'));
}