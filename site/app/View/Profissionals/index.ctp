<h4>Gerenciamento de Profissionais</h4>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Regra</th>
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($profissionals as $profissional): ?>
    <tr>
        <td><?php echo $profissional['Profissional']['id']; ?></td>
        <td>
            <?php
            	echo $this->Html->link($profissional['Profissional']['nome_pessoa'],
				array('controller' => 'profissionals', 'action' => 'view', $profissional['Profissional']['id']));
			?>
        </td>
        <td><?php echo $profissional['Profissional']['username']; ?></td>
        <td><?php echo $profissional['Profissional']['role']; ?></td>
        <td>
        	<?php
        	echo $this->Html->link(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . " Editar",
        			array('controller' => 'profissionals', 'action' => 'edit', $profissional['Profissional']['id'], 'role' => 'button'),
					array('class' => 'btn btn-warning', 'escape' => false, "data-toggle"=>"modal",
					"data-target"=>"#myModal")
        	);
        	?>
        	<?php
        	echo $this->Form->postLink(
        			$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Remover",
        			array('controller' => 'profissionals','action' => 'delete', $profissional['Profissional']['id']),
        			array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
        	);
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($profissional); ?>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Usu�rio</h4>
      </div>
      <div class="modal-body">
      	
        <?php
        
			echo $this->Form->create('Profissional', array('action' => 'add'));
			echo $this->Form->input('nome_pessoa', array('label' => 'Nome:'));
			echo $this->Form->input('username', array('label' => 'Email:'));
			echo $this->Form->input('password', array('label' => 'Senha:'));
			echo $this->Form->input('role', array('label' => 'Regra:'));
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false)
			);
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Profissionals','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
			);
			
			echo $this->Form->end();
		?>
      </div>
    </div>
  </div>
</div>