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

### DELETE em dados da tabela de usuários 

DELETE FROM usuarios WHERE id = 2;


-- OBS: Nunca se esqueça de passar uma condição para o delete


### INSERT na tabela de noticias 

INSERT INTO noticias (titulo, resumo, texto, imagem, usuario_id)
VALUES (
    'Descoberto oxigênio em Vênus',

    'Recentemente a sonda XYZ encontrou traços de oxigênio no planeta',

    'Nesta manhã, em um belo dia para o astrologia foi feita descoberta incrivél e muito bacana e legal sobre tudo que se pode imaginar no havai um cara pegou uma onda e subiu dropando e chegou em vênus conseguindo respirtar e assim feito a descoberta.', 
    'venus.jpg', 
    1

);


INSERT INTO noticias (titulo, resumo, texto, imagem, usuario_id)
VALUES (
    'Palmeiras o Primeiro campeão mundial',

    'A fifa confirma o titulo do palmeiras em 1951',

    'O palmeiras é realmente campeão mundial, após o time vestir a camisa da seleçao brasileira e ganhar o campeonarto de um time europeu, conclui que , sim o palmeiras tem mundial. ', 
    'campeao.jpg', 
    4


);


INSERT INTO noticias (titulo, resumo, texto, imagem, usuario_id)
VALUES (
    'O mundo esta acabando',

    'Com a onda de calor ao extremo, pode se dizer que o mundo vai acabar',

    'Se nao mudarmos nosso comportamento perante a natureza, podemos dizer que o mundo acabara em breve, ou mudamos hoje ou o amanha nao existira. ', 
    'fimdetudo.jpg', 
    3


);


### Objetivo: consulta que mostre a data e o titulo da noticia e o nome do autor desta noticia.

#### SELECT COM JOIM (CONSULTA COM JUNÇAO DE TABELAS)
-- Especificamos o nome da coluna com o nome da tabela 

SELECT 
noticias.data, 
noticias.titulo, 
usuarios.nome 

-- Especificamos quais tabelas serão 'juntadas/combinadas' 
FROM noticias JOIN usuarios

-- Criterio para o JOIN funcionar:
-- Fazemos uma comparaçao com a chave estrangeira (FK) com a chave primária (PK)
ON noticias.usuario_id = usuarios.id

-- opcional (ordenação/classificação pela data)
-- DESC indica ordem decrescente (mais recente vem primeiro)
ORDER BY data DESC; -- opcional 