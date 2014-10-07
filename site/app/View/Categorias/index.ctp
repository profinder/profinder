<center><h4>Gerenciamento de Categorias</h4></center>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Ações</th>
        
    </tr>

    <?php foreach ($categorias as $categoria): ?>
    <tr><td>
    <?php echo $categoria['Categoria']['id']; ?></td>
        <td>
            <?php
            	echo $categoria['Categoria']['nome_categoria'];
			?>
        </td>
        <td>
        	<?php
        		echo $this->Html->link(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . "",
        			array('controller' => 'categorias', 'action' => 'edit', $categoria['Categoria']['id'], 'role' => 'button'),
					array('class' => 'btn btn-default', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal"));
        	?>
        	<?php
        		echo $this->Form->postLink(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
        			array('controller' => 'categorias','action' => 'delete', $categoria['Categoria']['id']),
        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-default', 'escape' => false));
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($categoria); ?>
</table>

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Dados da Categoria</h4>
      		</div>
      		<div class="modal-body">
      	
		        <?php
		        
					echo $this->Form->create('Categoria', array('action' => 'add'));
					echo $this->Form->input('nome_categoria', array('label' => 'Nome:'));
					echo $this->Form->button(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
							array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
					);
					echo " ";
					echo $this->Html->link(
							$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
							array('controller' => 'Categorias','action' => 'index'),
							array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
					);
					
					echo $this->Form->end();
				?>
      		</div>
    	</div>
  	</div>
</div>