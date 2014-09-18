<h4>Gerenciamento de Servicos</h4>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
		<th>Código Categoria</th>
        <th>Ações</th>
        
    </tr>

    <?php foreach ($servicos as $servico): ?>
    <tr><td>
    <?php echo $servico['Servico']['id']; ?></td>
        <td>
            <?php
            	echo $this->Html->link($servico['Servico']['nome_servico'],
				array('controller' => 'servicos', 'action' => 'view', $servico['Servico']['id']));
			?>
        </td>
		<td>
            <?php
            	echo $this->Html->link($servico['Servico']['categoria_id'],
				array('controller' => 'servicos', 'action' => 'view', $servico['Servico']['id']));
			?>
        </td>
        <td>
        	<?php
        		echo $this->Html->link(
	        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . " Editar",
	        		array('controller' => 'servicos', 'action' => 'edit', $servico['Servico']['id'], 'role' => 'button'),
					array('class' => 'btn btn-warning', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal"));
        	?>
        	<?php
        		echo $this->Form->postLink(
	        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Remover",
	        		array('controller' => 'servicos','action' => 'delete', $servico['Servico']['id']),
	        		array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($servico); ?>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Servico</h4>
      </div>
      <div class="modal-body">
      	
        <?php        
			echo $this->Form->create('Servico', array('action' => 'add'));
			echo $this->Form->input('nome_servico', array('label' => 'Nome:'));

			App::import('Controller', 'Servicos');
			
			$servicos = new ServicosController;
			$servicos->constructClasses();
			$categorias=$servicos->nomeCategorias();
			$contador=0;
			$options= array();
			
			while($contador<sizeof($categorias))
			{
				array_push($options, array($categorias[$contador]['Categoria']['id'] => $categorias[$contador]['Categoria']['nome_categoria']));
				$contador++;
			}
			
			echo $this->Form->select('categoria_id', $options);
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller'=>'Servicos','action'=>'index'), 
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
</div>