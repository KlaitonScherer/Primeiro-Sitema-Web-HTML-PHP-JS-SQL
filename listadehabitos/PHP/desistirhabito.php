<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "listadehabitos";

//Cria conexão 

$conexao = new mysqli ($servidor, $usuario, $senha, $bancodedados);

if($conexao->connect_error) {
	die("A conexão falhou: " . $conexao->connect_error);
}

//obtem o id do registro que foi recebido via get

$id = $_GET["id"];
$sql = "DELETE FROM habito WHERE id= ".$id;

//Executa o comando deleter da variavel $sql

if (!($conexao->query($sql) === TRUE)) {
	die("Erro ao excluir: " . $conexao->error);
}

//Fecha a conexão

$conexao->close();

//redireciona para a pagina inicial

header("Location: ../index.php");

?>

