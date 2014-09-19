<center><h4>Gerenciamento de Cidades</h4></center>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
		<th>Cep</th>
		<th>Estado</th>
        <th>Ações</th>
        
    </tr>

    
    <?php foreach ($cidades as $cidade): ?>
    <tr><td>
    <?php echo $cidade['Cidade']['id']; ?></td>
        <td>
            <?php
            	echo $this->Html->link($cidade['Cidade']['nome_cidade'],
				array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']),
				array('escape' => false, "data-toggle"=>"modal", "data-target"=>"#myModalView"));
			?>
        </td>
		<td><?php echo $cidade['Cidade']['cep_cidade']; ?></td>
		<td><?php echo $cidade['Cidade']['estado_cidade']; ?></td>
        <td>
        	<?php
        		echo $this->Html->link(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . "",
        			array('controller' => 'cidades', 'action' => 'edit', $cidade['Cidade']['id'], 'role' => 'button'),
					array('class' => 'btn btn-default', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal"));
        	?>
        	<?php
        		echo $this->Form->postLink(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
        			array('controller' => 'cidades','action' => 'delete', $cidade['Cidade']['id']),
        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-default', 'escape' => false));
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($cidade); ?>
</table>

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog">
   		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Dados da Cidade</h4>
     		</div>
      		<div class="modal-body">
		        <?php
		        	echo $this->Form->create('Cidade', array('action' => 'add'));
					echo $this->Form->input('nome_cidade', array('label' => 'Nome:'));
					echo $this->Form->input('cep_cidade', array('label' => 'Cep:'));
					//echo $this->Form->input('estado_cidade', array('label' => 'Estado:'));
					
					echo $this->Form->input('estado_cidade', array('label' => 'Estado: <br/><br/>', 'options' => array(
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
						'TO' => 'Tocantins'))
					);
					
					echo $this->Form->button(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
							array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
					echo " ";
					echo $this->Html->link(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
							array('controller' => 'Cidades','action' => 'index'),
							array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
					
					echo $this->Form->end();
				?>
      		</div>
    	</div>
	</div>
</div>

<!-- Modal View-->
<div class="modal fade" data-backdrop="static" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Dados da Cidade</h4>
      		</div>
      		<div class="modal-body">
      	
		        <?php
					echo $this->Form->create('Cidade', array('action' => 'view'));
					echo $this->Form->input('nome_cidade', array('label' => 'Nome:'));
					echo $this->Form->input('cep_cidade', array('label' => 'CEP:'));
					echo $this->Form->input('estado_cidade', array('label' => 'Estado:'));
					
					echo $this->Html->link(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
							array('controller' => 'Cidades','action' => 'index'),
							array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
					
					echo $this->Form->end();
				 ?>
				
     		</div>
    	</div>
	</div>
</div>