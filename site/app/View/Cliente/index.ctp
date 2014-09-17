<h4>Gerenciamento de Bairros</h4>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>C�digo</th>
        <th>Nome</th>
        <th>Estado</th>
        <th>A��es</th>
        
    </tr>
   
    <?php foreach ($bairros as $bairro): ?>
    <tr><td>
    <?php echo $bairro['Bairro']['id']; ?></td>
        <td>
        	<?php
            	echo $this->Html->link($bairro['Bairro']['nome_bairro'],
				array('controller' => 'bairros', 'action' => 'view', $bairro['Bairro']['id']),
				array('escape' => false, "data-toggle"=>"modal", "data-target"=>"#myModalView"));
			?>
        </td>
        <td><?php echo $bairro['Bairro']['estado_bairro']; ?></td>
        <td>
        	<?php
        		echo $this->Html->link(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . " Editar",
        			array('controller' => 'bairros', 'action' => 'edit', $bairro['Bairro']['id'], 'role' => 'button'),
					array('class' => 'btn btn-warning', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal"));
        	?>
        	<?php
        		echo $this->Form->postLink(
        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Remover",
        		array('controller' => 'bairros','action' => 'delete', $bairro['Bairro']['id']),
        		array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($bairro); ?>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Bairro</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('Bairro', array('action' => 'add'));
			echo $this->Form->input('nome_bairro', array('label' => 'Nome:'));
			//echo $this->Form->input('estado_bairro', array('label' => 'Estado:'));
			echo $this->Form->input('estado_bairro', array('label' => 'Estado: <br><br>',
			'options' => array(
				'' => 'Selecione o estado:',
				'AC' => 'Acre',
				'AL' => 'Alagoas',
				'AP' => 'Amapá',
				'AM' => 'Amazonas',
				'BA' => 'Bahia',
				'CE' => 'Ceará',
				'DF' => 'Distrito Federal',
				'ES' => 'Espírito Santo',
				'GO' => 'Goiás',
				'MA' => 'Maranhão',
				'MT' => 'Mato Grosso',
				'MS' => 'Mato Grosso do Sul',
				'MG' => 'Minas Gerais',
				'PA' => 'Pará',
				'PB' => 'Paraíba',
				'PR' => 'Paraná',
				'PE' => 'Pernambuco',
				'PI' => 'Piauí',
				'RJ' => 'Rio de Janeiro',
				'RN' => 'Rio Grande do Norte',
				'RS' => 'Rio Grande do Sul',
				'RO' => 'Rondônia',
				'RR' => 'Roraima',
				'SC' => 'Santa Catarina',
				'SP' => 'São Paulo',
				'SE' => 'Sergipe',
				'TO' => 'Tocantins'
			)));
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Bairros','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
</div>


<!-- Modal View-->
<div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Bairro</h4>
      </div>
      <div class="modal-body">
      	
        <?php 
        
			echo $this->Form->create('Bairro', array('action' => 'view'));
			echo $this->Form->input('nome_bairro', array('label' => 'Nome:'));
			echo $this->Form->input('estado_bairro', array('label' => 'Estado:'));
			
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
					array('controller' => 'Bairros','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		 ?>
		
      </div>
    </div>
  </div>
</div>