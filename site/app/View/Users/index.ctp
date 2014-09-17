<h4>Gerenciamento de Administradores</h4>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Login</th>
        <th>Regra</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($usuarios as $user): ?>
    <tr><td>
    <?php echo $user['User']['id']; ?></td>
        <td>
        	<?php
            	echo $this->Html->link($user['User']['nome_pessoa'],
				array('controller' => 'users', 'action' => 'view', $user['User']['id']),
				array('escape' => false, "data-toggle"=>"modal", "data-target"=>"#myModalView"));
		?>	
        </td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td>
        	<?php
        	echo $this->Html->link(
        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-pencil')) . "", 
        		array('controller' => 'users', 'action' => 'edit', $user['User']['id'], 'role' => 'button'),
				array('class' => 'btn btn-warning', 'escape' => false, "data-toggle"=>"modal",
				"data-target"=>"#myModal"));
        	?>
        	<?php
        	echo $this->Form->postLink(
        		$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . "",
        		array('controller' => 'users','action' => 'delete', $user['User']['id']),
        		array('confirm' => 'Tem certeza?', 'role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
        	);
        	?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Usuário</h4>
      </div>
      <div class="modal-body">
      	
        <?php
			echo $this->Form->create('User', array('action' => 'add'));
			echo $this->Form->input('nome_pessoa', array('label' => 'Nome:'));
			echo $this->Form->input('username', array('label' => 'E-mail:'));
			echo $this->Form->input('password', array('label' => 'Senha:'));
			echo $this->Form->input('role', array('label' => 'Regra:'));
			
			echo $this->Form->button(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok'))." Salvar",
					array('type' => 'submit', 'class' => 'btn btn-success', 'escape' => false));
			echo " ";
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Cancelar",
					array('controller' => 'Users','action' => 'index'),
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
        <h4 class="modal-title" id="myModalLabel">Dados do Usuário</h4>
      </div>
      <div class="modal-body">
      	
        <?php 
        
			echo $this->Form->create('User', array('action' => 'view'));
			echo $this->Form->input('nome_pessoa', array('label' => 'Nome:'));
			echo $this->Form->input('username', array('label' => 'Login:'));
			echo $this->Form->input('role', array('label' => 'Regra:'));
			
			echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Sair",
					array('controller' => 'Users','action' => 'index'),
					array('role' => 'button', 'class' => 'btn btn-danger', 'escape' => false)
			);
			
			echo $this->Form->end();
		 ?>
		
      </div>
    </div>
  </div>
</div>