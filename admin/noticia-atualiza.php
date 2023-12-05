<?php
require_once "../inc/funcoes-noticias.php";
require_once "../inc/cabecalho-admin.php";

/* Capturar o id da noticia que foi trasmitido via URL */
$idNoticia = mysqli_real_escape_string ($conexao, $_GET['id']);

// Capturando o usuario logado(id) e o tipo dele (tipo)
$idUsuario = $_SESSION['id'];
$tipoUsuario = $_SESSION['tipo'];

// Chamando a função e passando os parâmentros
$noticia = lerUmaNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);

if (isset($_POST['atualizar'])) {
    $titulo = htmlspecialchars( $_POST['titulo']);
    $texto = htmlspecialchars( $_POST['texto']);
    $resumo = htmlspecialchars( $_POST['resumo']);

    // Lógica/ Algoritmo para a imagem
    /* Se o campo estiver vazio, então significa que o usuario nao quer trocar imagem, entao o sisitema vai manter a mesma imagem existente */
    if (empty($_FILES['imagem']['name'])) {
        $imagem = $_POST['imagem-existente'];
    } else {
        /* Caso o usuario queira trocar a imagem entao pegue a referencia do novo arquivo (nome e extensão ) fazemos o upload  */
        $imagem = $_FILES['imagem']['name'];
        upload($_FILES['imagem']);
    }

    atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticia, $idUsuario, $tipoUsuario);
    
    header ("location:noticias.php");
}

// fim if isset
?>


<div class="row">
    <article class="col-12 bg-white rounded shadow my-1 py-4">

        <h2 class="text-center">
            Atualizar dados da notícia
        </h2>

        <form enctype="multipart/form-data" class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

            <div class="mb-3">
                <label class="form-label" for="titulo">Título:</label>
                <input value="<?= $noticia['titulo'] ?>" class="form-control" required type="text" id="titulo" name="titulo">
            </div>

            <div class="mb-3">
                <label class="form-label" for="texto">Texto:</label>
                <textarea class="form-control" required name="texto" id="texto" cols="50" rows="6"><?= $noticia['texto'] ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="resumo">Resumo (máximo de 300 caracteres):</label>
                <span id="maximo" class="badge bg-danger">0</span>
                <textarea class="form-control" required name="resumo" id="resumo" cols="50" rows="2" maxlength="300"><?= $noticia['resumo'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="imagem-existente" class="form-label">Imagem da notícia:</label>
                <!-- campo somente leitura, meramente informativo -->
                
                <input value="<?= $noticia['imagem'] ?>" class="form-control" type="text" id="imagem-existente" name="imagem-existente" readonly>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Caso queira mudar, selecione outra imagem:</label>
                <input class="form-control" type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/gif, image/svg+xml">
            </div>

            <button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
        </form>

    </article>
</div>


<?php
require_once "../inc/rodape-admin.php";
?>