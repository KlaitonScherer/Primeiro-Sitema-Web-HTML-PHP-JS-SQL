<!DOCTYPE html>
<html lang="pt-br">
	<head>
		 <meta charset="utf-8">
		 <link rel="stulesheet" type="text/css" href="styles.css">
		 <title> Lista de hábitos</title>
	</head>
	<body>
		<div class="center">
		<h1>Novo Habito</h1>
		
		<!-- Formulario para cadastro de pessoas,
		note a utilização do atributo name, que faz
		o link entre os elementos do DOM e o JavaScript-->
		
		<form id="formulario" action="inserthabito.php">
			<p><label>Nome: <input type="text" id="nome" name="nome" autofocus /></label></p>
			<p><input type="submit" value="Criar"></P>
			
		</form>
		</div>
		<script type="text/javascript">
		
			// Declara uma função para validar o formulario
		
			var validaform = function(){
				var nomeHabito = document.getElementByld("nome").value;
				
				if ("" == nomeHabito){
					alert("É necesssario informar o nome do Habito");
					
					return false;
				}
			}
			
			//Aqui declaramos que esta função ocorre semprem no submit do formulario.
			
			document.getElementByld("formulario").onsubmit = validaForm;
		</script>
	</body>
</html>