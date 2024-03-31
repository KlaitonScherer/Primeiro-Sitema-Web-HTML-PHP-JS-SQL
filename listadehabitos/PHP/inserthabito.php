<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "listadehabitos";

$conexao = new mysqli ($servidor, $usuario, $senha, $bancodedados);

//Verifica se houve erro ao abrir conexão 

if ($conexao->connect_error) { 
	die("A conexão falhou: " . $conexao->connect_error);
}

		
$sql = " SELECT max(id) as MAIOR_ID ".
		    		"       , nome ".
			   		" FROM habito ";
$maiorid = $conexao->query($sql);

$resultado = $maiorid->fetch_assoc();
if($resultado && $resultado['MAIOR_ID'] >= 1){
	$id = ++$resultado['MAIOR_ID'];
}else{
		$id = 1;
	}




//Busca nome que foi recebido via get atraves do formulario de cadastro

$nome = $_GET["nome"];

//Insere o habito na tabela habito do banco de dados 

$sql = "INSERT INTO habito (id, nome, status) VALUES ('".$id."','".$nome."', 'A')";

//verifica se ocorreu tudo bem, caso houve erro, fecha conexão e aborta o programa.

if(!($conexao->query($sql) === TRUE)) {
	$conexao->close();
	die("Erro : " . $sql . "<br>" . $conexao->error);

}

// Fecha a conexao com o BD

$conexao->close();

//Envia para a pagina index onde aparece a lista de habitos ja com o novo habito cadastrado 

header("Location: ../index.php");
?>