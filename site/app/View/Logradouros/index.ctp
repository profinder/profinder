<center><h4>Gerenciamento de Logradouros</h4></center>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th><h3>Código</h3></th>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th width = "100px"></th>
    </tr>
   
    <?php foreach ($logradouros as $logradouro): ?>
    <tr>
    	<td>
    		<?php echo $logradouro['Logradouro']['id']; ?>
    	</td>
        <td>
        	<?php
            	echo $this->Html->link($logradouro['Logradouro']['nome_logradouro'],
				array('controller' => 'Logradouros', 'action' => 'view', $logradouro['Logradouro']['id']));
			?>
        </td>
        <td>
        	<?php echo $logradouro['Logradouro']['tipo_logradouro']; ?>
        </td>
        <td>
        	<?php echo $logradouro['Logradouro']['id_bairro']; ?>
        </td>
        <td>
        	<?php echo $logradouro['Logradouro']['id_cidade']; ?>
        </td>
        <td>
        	<?php
        		echo $this->Html->link(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . "",
        			array('controller' => 'logradouros', 'action' => 'edit', $logradouro['Logradouro']['id'], 'role' => 'button'),
					array('class' => 'btn btn-success', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal"));
        	?>
        	<?php
        		echo $this->Form->postLink(
        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
        		array('controller' => 'logradouros','action' => 'delete', $logradouro['Logradouro']['id']),
        		array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($logradouro); ?>
</table>

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Dados do logradouro</h4>
      		</div>
      		<div class="modal-body">
      	
		        <?php
					echo $this->Form->create('Logradouro', array('action' => 'add'));
					echo $this->Form->create('Logradouro');
					echo $this->Form->input('cep_logradouro');
					echo $this->Form->input('nome_logradouro');
					echo $this->Form->input('nome_logradouro_completo');
					echo $this->Form->input('tipo_logradouro');
										
					echo $this->Form->input('uf_logradouro', array('label' => 'Estado: <br><br>',
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
					
					echo $this->Form->input('id_bairro');
					echo $this->Form->input('id_cidade');
					
					echo $this->Form->button(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
							array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
					
					echo " ";
					echo $this->Html->link(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
							array('controller' => 'logradouros','action' => 'index'),
							array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
					
					echo $this->Form->end();
				?>
     		</div>
    	</div>
 	</div>
</div>