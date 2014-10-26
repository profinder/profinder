<center><h4>Gerenciamento de Serviços</h4></center>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
		<th>Código Categoria</th>
        <th width = "100px"></th>
        
    </tr>

    <?php foreach ($servicos as $servico): ?>
    <tr><td>
    <?php echo $servico['Servico']['id']; ?></td>
        <td>
            <?php
            	echo $servico['Servico']['nome_servico'];
			?>
        </td>
		<td>
            <?php
            	echo $servico['Servico']['categoria_id'];
			?>
        </td>
        <td>
        	<?php
        		echo $this->Html->link(
	        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . "",
	        		array('controller' => 'servicos', 'action' => 'edit', $servico['Servico']['id'], 'role' => 'button'),
					array('class' => 'btn btn-success', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal"));
        	?>
        	<?php
        		echo $this->Form->postLink(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
        			array('controller' => 'servicos','action' => 'delete', $servico['Servico']['id']),
        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false));
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($servico); ?>
</table>

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					?>
					
					<select class="form-control" id="categorias" name="categorias">
					<option>Selecione a categoria</option>
						<?php
						while($contador<sizeof($categorias))
						{
						?>
							<option value='<?php echo $categorias[$contador]['Categoria']['id']?>'><?php echo $categorias[$contador]['Categoria']['nome_categoria']?></option>
							<?php
							$contador++;
						}
						?>
					</select>
					
					<?php
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