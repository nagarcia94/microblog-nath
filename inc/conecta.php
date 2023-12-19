<?php
/* Script de conexão ao servidor de Banco de Dados */
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_nath";



/* Usando a Funçao mysqli connect para conectar ao sevidor de banco de dados */
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

/* Definindo a charset da conexão também como utf8 */
mysqli_set_charset($conexao, "utf8");

/* Verificação da conexão */
// Se (if) nao for possivel realizar a aplicação (!) pare a aplicaçaõ (die) e mostre a msg de erro. (else) senao, a conexão foi feita com sucesso.

if(!$conexao){
    die("Deu ruim" .mysqli_connect_errno());
}
// else {
//     echo "Beleza, conectado!";
// }
