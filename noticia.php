<?php
require "inc/funcoes-noticias.php";
require "inc/cabecalho.php"; 

/* Capturar o id da noticia que foi trasmitido via URL */
$idNoticia = $_GET['id'];

// Chamando a função
$dadosDaNoticia = lerDetalhes ($conexao, $idNoticia);




?>


<div class="row my-1 mx-md-n1">

    <article class="col-12">
        <h2> <?=$dadosDaNoticia['titulo']?></h2> 
        
        <p class="font-weight-light">
            <time><?=$dadosDaNoticia['data']?></time> - 
            <span><?=$dadosDaNoticia['autor']?></span>
        </p>
        <img src="imagens/<?=$dadosDaNoticia['imagem']?>" alt="" class="float-start pe-2 img-fluid">

        <p class="ajusta-texto"><?=$dadosDaNoticia['texto']?></p>
    </article>
    

</div>        

<?php 
require_once "inc/rodape.php";
?>

