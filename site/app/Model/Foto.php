<?php
class Foto extends AppModel {
	public $useTable = 'tb_foto';
	public $belongsTo = array (
			'Anuncio' => array (
					'className' => 'Anuncio',
					'foreignKey' => 'anuncio_id' 
			) 
	);
	
	public function beforeSave($options = array()) {
		if (!empty ( $this->data ['Foto'] ['legenda_foto'] ['name'] )) {
			$this->data ['Foto'] ['legenda_foto'] = $this->upload ( $this->data ['Foto'] ['legenda_foto'] );
		} else {
			unset ( $this->data ['Foto'] ['legenda_foto'] );
		}
	}
}
