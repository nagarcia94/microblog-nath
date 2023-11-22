<?php

/* Sessões do php- 
 Recurso usado para o controle de acesso á determinadas páginas e/ou recursos do site.
Exemplo: área admin, painel de controle, área de cliente/aluno etc.

Nestas áreas o acesso só é possível mediante alguma forma de auteticação.
 Exemplo: login/senha. digital, facil etc. */


// Verificar se NÃO existe uma sessão em funcionamento.
if(!isset($_SESSION)){
    // Se nao exisite um sessão entao inicie uma sessão
    session_start();

}

//  essa função serve para nao deixar uma pessoa que nao logou no site entrar na area administrativa. 
function verificaAcesso (){
    // Se NÃO existir uma variavel de sessao chamada 'id' baseado no id de um usuário logado, então significa que ele não esta logodo no sistema.
    if(!isset($_SESSION['id'])){
        // Portanto, destrua os dados de sessão, redirecionando para a página de login.php e para o script.
        session_destroy();
        header("location:../login.php?acesso_negado");
        exit;
    }
}

function login($id,$nome, $tipo){
  /* Criação de variavéis de sessão 
  Recursos que ficam disponivéis para uso durante a sessão, ou seja enquanto o navegador não for fechado ou o usuario não clicar em Sair. */  

  $_SESSION["id"]= $id;
  $_SESSION["nome"]= $nome;
  $_SESSION["tipo"]= $tipo;

}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit; 
}

?>