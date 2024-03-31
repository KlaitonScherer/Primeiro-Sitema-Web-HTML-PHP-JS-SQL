<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "listadehabitos";

//Cria conexão 

$conexao = new mysqli ($servidor, $usuario, $senha, $bancodedados);

//Verifica se conectou com sucesso.

if($conexao->connect_error) {
	die("Falha na conexão: " . $conexao->connect_error);
	
}

//Atualiza o status de A - ativo para V - vencido


$id = $_GET["id"];
$sql = "UPDATE habito "
       ."SET status = 'V' "
	   ."WHERE id=".$id;
	   
		
//verifica se o comando foi executado com sucesso.

if(!($conexao->query($sql) === TRUE)) {
	$conexao->close();	
	die("Erro ao atualizar: " . $conexao->error);
}

//Fecha conexão

$conexao->close();

//redireciona para o index

header("Location: ../index.php");

?>