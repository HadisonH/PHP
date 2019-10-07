#CRIAR TABELA

	CREATE TABLE tbCliente (
		CPF VARCHAR(11) PRIMARY KEY,
		NOME VARCHAR(100),
		ENDERECO1 VARCHAR(150),
		ENDERECO2 VARCHAR(150),
		BAIRRO VARCHAR(50),
		CIDADE VARCHAR(50),
		ESTADO VARCHAR(50),
		CEP VARCHAR(8),
		IDADE SMALLINT,
		SEXO VARCHAR(1),
		LIMITE_CREDITO FLOAT,
		VOLUME_COMPRA FLOAT,
		PRIMEIRA_COMPRA BIT(1)
	);

	CREATE TABLE tbProduto (
		PRODUTO VARCHAR(20),
		NOME VARCHAR(150),
		EMBALAGEM VARCHAR(50),
		TAMANHO VARCHAR(50),
		SABOR VARCHAR(50),
		PRECO_LISTA FLOAT
	);

#ALTERAR TABELA - NESTE CASO CONFIGURANDO A PRIMARY KEY

	ALTER TABLE tbProduto ADD PRIMARY KEY (PRODUTO);

	#ADICIONAR COLUNA

		ALTER TABLE tbCliente ADD COLUMN (DATA_NASCIMENTO DATE);

#APAGAR TABELA

	DROP TABLE tbCliente, tbProduto;

#ADICIONAR VALORES

	INSERT INTO tbProduto (
		PRODUTO, NOME, EMBALAGEM, TAMANHO, SABOR, PRECO_LISTA
	) VALUES (
		'1040107', 'Light - 350 ml - Melância', 'Lata', '350 ml', 'Melância', 4.56
	), (
		'1037797', 'Clean - 2 Litros - Laranja', 'PET', '2 Litros', 'Laranja', 16.01
	);

	INSERT INTO tbProduto (
		PRODUTO, NOME, EMBALAGEM, TAMANHO, SABOR, PRECO_LISTA
	) VALUES (
		'1000889', 'Sabor da Montanha - 700 ml - Uva', 'Garrafa', '700 ml', 'Uva', 6.31
	);

	INSERT INTO tbCliente (
		CPF , NOME, ENDERECO1, ENDERECO2, BAIRRO, CIDADE, ESTADO, CEP, IDADE,
		SEXO, LIMITE_CREDITO, VOLUME_COMPRA, PRIMEIRA_COMPRA,DATA_NASCIMENTO
	) VALUES (
		'46372746808', 'Adison Rocha', 'Via das Acácias, 617', '', 'Jardim Colibri',
		'Embu das Artes', 'São Paulo', '06805330', 19, 'M', 10000.00, 2000.00, 0, 	'2000-09-10'
	);

#ALTERAR INFORMAÇÕES

	UPDATE tbProduto SET SABOR = 'GOIABA',
						 NOME = 'Sabor da Montanha - 700 ml - Goiaba',
                         EMBALAGEM = 'PET'
	WHERE PRODUTO = '1000889';

#DELETAR A LINHA

	DELETE FROM tbProduto
	WHERE PRODUTO = '1000889';

#DELETAR TUDO DA TABELA

	DELETE FROM tbProduto;
    
#MOSTRAR TABELA

	SELECT * FROM tbCliente;
	SELECT * FROM tbProduto;
    
    SELECT * FROM tbProduto WHERE SABOR = 'Laranja';
    
    SELECT * FROM tbCliente WHERE IDADE < 15; #DA PRA USAR COM NÚMEROS, DATAS E STRINGS TAMBÉM
    
    SELECT * FROM tbProduto WHERE PRECO_LISTA BETWEEN 5 AND 17;
    
    SELECT * FROM tbCliente WHERE YEAR(DATA_NASCIMENTO) = 2000;
    
    SELECT * FROM tbProduto WHERE SABOR IN ('Laranja', 'Uva'); #TRAS SOBRE AS DUAS INFORMAÇÕES
    
    SELECT * FROM tbCliente WHERE NOME LIKE '%Rocha%'; #BUSCA OS QUE TEM A PALAVRA

	SELECT NOME FROM tbCliente LIMIT 5; #MOSTRA OS 5 PRIMEIROS
    SELECT NOME FROM tbCliente LIMIT 5,5; #MOSTRA OS 5 APÓS OS 5 PRIMEIROS

	SELECT CPF AS CPF_CLIENTE FROM tbCliente; #DA APELIDO - MOSTRA O CAMPO COM OUTRO NOME
    
    SELECT DISTINCT EMBALAGEM, TAMANHO FROM tbProduto; # NÃO REPETE AS INFORMAÇÕES COMBINADAS
    
    SELECT * FROM tbProduto ORDER BY PRECO_LISTA DESC; #MOSTRA DE FORMA DECRESCENTE
    
    SELECT EMBALAGEM, MAX(PRECO_LISTA) AS MAIOR_PRECO FROM tbProduto GROUP BY EMBALAGEM; #MOSTRA O PRODUTO MAIS CARO DE CADA EMBALAGEM
    
    SELECT SABOR, COUNT(*) AS QUANTIDADE FROM tbProduto GROUP BY SABOR  ORDER BY SABOR DESC;
    
    SELECT EMBALAGEM, MAX(PRECO_LISTA) AS MAIOR_PRECO
    FROM tbProduto GROUP BY EMBALAGEM HAVING MAX(PRECO_LISTA) < 10; #HAVING FAZ O PAPEL DE WHERE QUANDO É USADO O MIN, MAX, SUM .. E O GROUP BY
    
	SELECT EMBALAGEM,
	CASE
		WHEN PRECO_LISTA >= 10 THEN 'CARO'
        WHEN PRECO_LISTA BETWEEN 5 AND 10 THEN 'NAQUELAS'
   ELSE 'SUAVE'
   END AS STATUS_PRECO, AVG(PRECO_LISTA) AS PRECO_MEDIO
   FROM tbProduto
   WHERE SABOR = 'UVA'
   GROUP BY EMBALAGEM,
   CASE
		WHEN PRECO_LISTA >= 10 THEN 'CARO'
		WHEN PRECO_LISTA BETWEEN 5 AND 10 THEN 'NAQUELAS'
	ELSE 'SUAVE'
	END
	ORDER BY EMBALAGEM;