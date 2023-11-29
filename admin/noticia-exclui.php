<?php 
require "../inc/funcoes-noticias.php";
require "../inc/funcoes-sessao.php";

verificaAcesso();

$idNoticia = $_GET['id'];

$idUsuario = $_SESSION['id'];
$tipoUsuario = $_SESSION['tipo'];

$noticia = excluirNoticia ($conexao, $idNoticia, $idUsuario, $tipoUsuario);

    
    header ("location:noticias.php");



    


