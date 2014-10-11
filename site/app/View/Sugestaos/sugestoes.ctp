<center><h4>Sugestões</h4></center>
<br/><br/>
<table class="table">
    <tr>
        <th>Código</th>
        <th>Email do Profissional</th>
		<th>Sugestão</th>
        
    </tr>

    <?php 
    	App::import('Controller', 'Sugestaos');
		$sugestaoController = new SugestaosController;
		$sugestaoController->constructClasses();
		$sugestaos = $sugestaoController->sugestoes();
		
		$contador = 0;
		$contador2 = 0;
		while($contador<sizeof($sugestaos))
		{
			$id = $sugestaos[$contador]['tb_sugestao']['id'];
			$texto = $sugestaos[$contador]['tb_sugestao']['texto_sugestao'];
			
			$profissional = $sugestaoController->dadosProfissionalSugestao($id);
			
			$email_profissional = $profissional[$contador2]['tb_pessoa']['username'];
	?>
    <tr>
    	<td>
    		<?php echo $id; ?>
    	</td>
        <td>
            <?php echo $email_profissional;?>
        </td>
		<td>
            <?php echo $texto; ?>
        </td>
    </tr>
    <?php 
		$contador++;
	}?>
</table>