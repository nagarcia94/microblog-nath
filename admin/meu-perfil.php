<?php 
require_once "../inc/funcoes-usuarios.php";
require_once "../inc/cabecalho-admin.php";




/* Pegando o valor do parametro id vindo da SESSAO */
$id = $_SESSION['id'];

/* Chamando a funcao e guardando o retorno dela */
$usuario = lerUmUsuario($conexao, $id);

// Verificando se o formulário foi acionado
if(isset($_POST['atualizar'])){
	// Capturando os dados
	$nome = $_POST ['nome'];
	$email = $_POST ['email'];
	$tipo = $_SESSION ['tipo']; 


	/* Lógica para a senha: 
	- Se o campo senha estiver vazio ou se a senha digitada for igual a senha que ja existe no banco de dados, então significa que o usuario nao alterou a senha, por tanto a senha se mantem a mesma.*/
	if (empty($_POST['senha'])|| password_verify($_POST['senha'],$usuario['senha'])){ 
		$senha = $usuario ['senha']; /* matemos a mesma */
		
		/*- Caso contrario, pegaremos a senha movel digitada e a codificamos antes de mandar para o banco. */

	} else {
		$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	}
	// chamamos a função e passamos os dados.
     atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);

// Atualize na sessao atual o nome da pessoa, caso ela mude.
$_SESSION["nome"] = $nome;

    
	 // Redirecionamos para a pagina de usuarios
	 header("location:index.php");

}

?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar meus dados
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?=$usuario['nome']?>" class= "form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?=$usuario['email']?>" class="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

