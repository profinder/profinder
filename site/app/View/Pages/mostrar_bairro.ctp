<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<h2>Selecione os bairros que você está disponível a atender: </h2>
					<hr>
					<?php
						
						$cidade = $this->Session->read('cidade');
						$idAnuncio = $this->Session->read('idAnuncio');
						$pages = new PagesController;
						$pages->constructClasses();
						$bairros=$pages->bairros($cidade);
						
						
						
						$contador=0;
						?>
							</br>
							<input type="checkbox" value="Selecionar Todos" name="Selecionar todos" id="selecionarTodos" onclick="verificar()"/><?php echo "Selecionar Todos"?> <br/>
							<form name="formBairro" action="/profinder/site/pages/checkValue" method="post">
							
							<?php
							while ($contador!=sizeof($bairros)){
								$bairro_nome=$bairros[$contador]['tb_bairro']['nome_bairro'];
								$bairro_id=$bairros[$contador]['tb_bairro']['id'];
						?>
						
							
							<input type="checkbox" name='<?php echo $bairro_id?>' value='<?php echo $contador ?>'> <?php echo $bairro_nome?> <br/>
							
							
						<?php
								$contador++;
							}
						?>
							<input type="submit" value="Enviar Dados"/>
							<input type="reset" value="Limpar"/>
						</form>
						
			 	</div>
			
			</div>
		</div>
	</div>
</div>

<script>
	var on="off";
	
	function verificar(){
		if(on=="off"){
			on="on"
			for (i=0;i<document.formBairro.elements.length;i++) 
			  if(document.formBairro.elements[i].type == "checkbox")	
				 document.formBairro.elements[i].checked=1
		}
		else if(on=="on"){
			on="off"
			for (i=0;i<document.formBairro.elements.length;i++) 
				  if(document.formBairro.elements[i].type == "checkbox")	
					 document.formBairro.elements[i].checked=0
		}
		
	}
	function selecionarTodos(){ 
		   for (i=0;i<document.formBairro.elements.length;i++) 
			  if(document.formBairro.elements[i].type == "checkbox")	
				 document.formBairro.elements[i].checked=1
			
	} 

	function naoSelecionarTodos(){ 
			   for (i=0;i<document.formBairro.elements.length;i++) 
				  if(document.formBairro.elements[i].type == "checkbox")	
					 document.formBairro.elements[i].checked=0
				
	} 
</script>