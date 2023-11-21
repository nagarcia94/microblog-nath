<?php 
require_once "../inc/funcoes-usuarios.php";
require_once "../inc/cabecalho-admin.php";
/* Pegando o valor do parametro id vindo da URL */
$id = $_GET['id'];

/* Chamando a funcao e guardando o retorno dela */
$usuario = lerUmUsuario($conexao, $id);

// Verificando se o formulário foi acionado
if(isset($_POST['atualizar'])){
	// Capturando os dados
	$nome = $_POST ['nome'];
	$email = $_POST ['email'];
	$tipo = $_POST ['tipo'];


	/* Lógica para a senha: 
	- Se o campo senha estiver vazio ou se a senha digitada for igual a senha que ja existe no banco de dados, então significa que o usuario nao alterou a senha, por tanto a senha se mantem a mesma.
	
	- Caso contrario, pegaremos a senha movel digitada e a codificamos antes de mandar para o banco. */

}

?>



<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar dados do usuário
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?=$usuario['nome']?>" class="form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?=$usuario['email']?>" class="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<div class="mb-3">
				<label class="form-label" for="tipo">Tipo:</label>
				<select class="form-select" name="tipo" id="tipo" required>
					<option value=""></option>


					<option 
					<?php if ($usuario ["tipo"] === "editor") echo "selected";?>
					value="editor">Editor</option>

					

					<option
					<?php if ($usuario["tipo"] === "admin") echo "selected";?> value="admin">Administrador</option>
				</select>
			</div>
			
			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

