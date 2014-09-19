<h4>Gerenciamento de Administradores</h4>
<br/>

<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Novo</button>
<br/><br/>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Login</th>
    </tr>

	<?php 
		$users = new UsersController;
		$users->constructClasses();
		$administradores=$users->listarAdministradores();
		//var_dump($administradores);
						
		$contador=0;
		while ($contador!=sizeof($administradores))
		{
			$id_admin = $administradores[$contador]['tb_pessoa']['id'];
			$nome_admin = $administradores[$contador]['tb_pessoa']['nome_pessoa'];
			$username_admin = $administradores[$contador]['tb_pessoa']['username'];
			
			//$anuncio_id=$anuncios[$contador]['tb_anuncio']['id'];
			//echo $anuncio_titulo;
			//echo "<br/>";
	?>
		<tr>
			<td>
	    		<?php echo $id_admin; ?>
	    	</td>
	    	<td>
	    		<?php echo $nome_admin; ?>
	    	</td>
	    	<td>
	    		<?php echo $username_admin; ?>
	    	</td>
	    </tr>
	    <?php 
			$contador++;
		}
	?>  
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

			echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'admin'));

			echo $this->Form->input('role', array('type' => 'hidden', 'value' => 'admin'));

			
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