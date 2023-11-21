<?php 

require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    
    /* Montando uma variavel com o comando SQL de INSERT e com os dados (paramentro) recebidos pela função */
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo)
    VALUES ('$nome', '$email', '$senha', '$tipo')";

   /* Executando o comando SQL  */
   mysqli_query($conexao, $sql) or die (mysqli_errno($conexao));



}

function lerUsuarios($conexao){
    /* Comando SQL para fazer a leitura de dados (select) */
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";

    // Execução do comando e aramzenamento do resultado da consulta/query
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornamos o resultado da query transformando em array associativo
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);

}

