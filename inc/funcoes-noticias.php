<?php
require "conecta.php";


/* Usada em noticia-insere.php */
function inserirNoticia($conexao, $titulo, $texto, $resumo, $nomeImagem, $usuarioId)
{

    $sql = "INSERT INTO noticias (titulo, texto , resumo, imagem, usuario_id) 
    VALUES( '$titulo', '$texto', '$resumo', '$nomeImagem', $usuarioId ) ";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim inserirNoticia


/* Usada em noticia-insere.php e noticia-atualiza.php */
function upload($arquivo)
{


    // VALIDAÇÃO BACK-END


    // Lista de formatos suportados pelo site : deve ser igual ao que esta no html.
    $tiposValidos = [
        "image/png", "image/jpeg",
        "image/gif", "image/svg+xml"
    ];
    // Verificando se o tipo do aqeuivo NÃO È um dos suportados
    if (!in_array($arquivo['type'], $tiposValidos)) {
        echo "<script>
    alert ('Formato inválido!'); history.back();
    </script>";
        exit;
    }
    // Obtendo apenas o nome/extensão do arquivo 
    $nome = $arquivo['name'];

    //Obtendo informções de acesso temporario  
    $temporario = $arquivo['tmp_name'];

    // Definindo para onde a imagem vai com qual nome
    $destino = "../imagens/" . $nome;

    // movendo o arquivo da área temporaria para a pasta final
    move_uploaded_file($temporario, $destino);
}


// fim upload


/* Usada em noticias.php */
function lerNoticias($conexao, $idUsuario, $tipoUsuario)
{ 
    //Verificando se o tipo de usúario é admin
    if ($tipoUsuario == 'admin') {
        // SQL do admin: pode carregar/ver TUDO de TODOS
 $sql = "SELECT 
      noticias.id, 
      noticias.titulo, 
      noticias.data, 
      usuarios.nome AS autor
    FROM noticias JOIN usuarios
    ON noticias.usuario_id = usuarios.id 
    ORDER BY data DESC";
    } else {
        // SQl do editor : pode carregar/ver TUDO DELE SOMENTE
        $sql = "SELECT id , titulo, data FROM noticias 
        WHERE usuario_id = $idUsuario ORDER BY data DESC";
    }
// Executando a conculta e guardando o resultado dela
    $resultado= mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
// Retornando o resultado convertido em uma matriz/array
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);

} // fim lerNoticias


/* Usada em noticias.php e páginas da área pública */
function formataData()
{
} // fim formataData


/* Usada em noticia-atualiza.php */
function lerUmaNoticia($conexao)
{


    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim lerUmaNoticia


/* Usada em noticia-atualiza.php */
function atualizarNoticia($conexao)
{


    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim atualizarNoticia


/* Usada em noticia-exclui.php */
function excluirNoticia($conexao)
{


    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim excluirNoticia



/* ******************************************************* */


/* Funções usadas nas páginas da área pública */

/* Usada em index.php */
function lerTodasAsNoticias($conexao)
{


    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim lerTodasAsNoticias


/* Usada em noticia.php */
function lerDetalhes($conexao)
{


    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim lerDetalhes


/* Usada em resultados.php */
function busca($conexao)
{

    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim busca
