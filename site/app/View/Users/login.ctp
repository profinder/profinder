<div class="users form">
<<<<<<< HEAD
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	    <fieldset>
	        <legend>
	            <?php echo __('Digite seu login e senha.'); ?>
	        </legend>
	        <?php echo $this->Form->input('username');
	       		 	echo $this->Form->input('password');
	    	?>
	    </fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
=======
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Digite seu login e senha!'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
>>>>>>> origin/master
</div>