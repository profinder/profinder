<?php
	class Anuncio extends AppModel
	{
		public $useTable = 'tb_anuncio';
		
		public $hasMany = array(
			'Foto' => array(
				'className' => 'Foto',
				'foreignKey' => 'anuncio_id'));
		
		public $belongsTo = array(
			'Endereco' => array(
				'className' => 'Endereco',
				'foreignKey' => 'endereco_id',
			'Profissional' => array(
				'className' => 'Profissional',
				'foreignKey' => 'profissional_id')
		));
		
		/*public function beforeSave($options = array())
		{
			if(!empty($this->data['Anuncio']['legenda_foto']['name'])) {
				
				$this->data['Anuncio']['legenda_foto'] = $this->upload($this->data['Anuncio']['legenda_foto']);
				
			} else {
				//$var_dump($this->data['Anuncio']['legenda_foto']);
				unset($this->data['Anuncio']['legenda_foto']);
			}
		}*/
	}
?>