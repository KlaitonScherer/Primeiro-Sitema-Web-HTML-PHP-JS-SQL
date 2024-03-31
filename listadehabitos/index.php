<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		 <meta charset="utf-8">
		 <link rel="stylesheet" type="text/css" href="styles.css">
		 <title>Lista de hábitos</title>
	</head>
	<body>
		 <div class="center">
		 <h1>Lista de hábitos</h1>
		 <p>Cadastre aqui os hábitos que você tem que vencer para melhorar sua vida!</p>
		 <?php 
		 
		 $servidor = "localhost";
		 $usuario = "root";
		 $senha = "";
		 $bancodedados = "listadehabitos";
		 
		 $conexao = new mysqli ( $servidor
		                         , $usuario
								 , $senha
								 , $bancodedados);
								 
		if ($conexao->connect_error) {
			 die("Falha na conexão: " . $conexao->connect_error);
		}
		
		$sql = " SELECT id ".
		       "       , nome ".
			   " FROM habito ".
			   " WHERE status = 'A'";
		$resultado = $conexao->query($sql);
		?>
		
		<?php
		if ($resultado->num_rows > 0) {			
		?>
			
		<br/>
	<table class="center">
		 <tbody>
			   
			<?php 
			while($registro = $resultado->fetch_assoc()) {
			?>
			
			<tr>		
			<td><p>Habito: <?php echo $registro['nome']; ?></p></td>
			<td><a href="PHP/vencerhabito.php?id=<?php echo $registro['id']; ?>">Vencer</a></td>
			<td><a href="PHP/desistirhabito.php?id=<?php echo $registro["id"]; ?>">Desistir</a></td>
			</tr>
		<?php
			}
		}
		?>
		</tbody>
	</table>
	<p>Continue mudando sua vida!</p>
	<p>Cadastre mais hábitos!</p>
	        <?
  			else {
			?>
	<p>Você não possui hábitos cadastrados!</p>
	<p>Começe já a mudar sua Vida!</p>
	    <?
		}		
		?>
		

	<a href="PHP/novohabito.php">Cadastrar Hábito</a>
	</div>
	</body>
</html>