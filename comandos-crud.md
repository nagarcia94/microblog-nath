# Comandos SQL para operações de dados (crud)

## Resumo 

- C: CREATE (INSERT)-> usado para inserir dados
- R: READ (SELECT)-> usado para ler/ consultar dados 
- U: UPDATE (UPDATE) -> usado para atualizar dados
- D: DELETE (DELETE) -> usado para excluir dados.

## Exemplos

### INSERT na tabela de usuários 

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES('Nathalia Garcia',
       '000nagarcia@gmail.com',
       '123palmeiras',
       'admin'
);


INSERT INTO usuarios(nome, email, senha, tipo)
VALUES(
 'Fulano da Silva',
 'fulano@gmail.com',
 '456',
 'editor'),

(
 'Beltrano Soares',
 'beltrano@msn.com',
 '000penha',
 'admin'), 

(
 'Chapolin Colorado',
 'chapolin@vingadores.com.br',
 'marreta',
 'editor');


### SELECT na tabela de usuários 
<!-- o * significa selecionar TODOS os dados  -->
SELECT * FROM usuarios; 
SELECT nome, email FROM usuarios; 
SELECT nome, email FROM usuarios WHERE tipo = 'admin'

### UPDATE em dados da tabela de usuários

UPDATE usuarios SET tipo  = 'editor' WHERE id = 2;

OBS: nunca se esqueça de passar uma condiçao para UPDATE!
