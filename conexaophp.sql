	create database conexaophp;
	use conexaophp;

	create table produto(
	idProd int primary key auto_increment,
	nome varchar (80) not null,
	cor varchar (50) not null,
	valor decimal (5,2) 
	);


	insert produto values(0, "chuteira campo", "vermelho","190.00"),
		(0, "camiseta", "azul","70.00"),
		(0, "luva", "amarelo","50.00"),
		(0, "bermuda", "preto","60.00"),
		(0, "bola basquete", "laranja","80.00"),
		(0, "blusa termica", "vermelho","90.00"),
		(0, "chuteira futsal", "rosa","120.00"),
		(0, "chuteira society", "verde","140.00"),
		(0, "bola futsal", "cinza","70.00");

	-- Produtos das cores AZUL e VERMELHO, Terão um desconto de 20%.
	update produto
	set valor = valor * 0.8
	where cor = "vermelho" or cor = "azul";

	-- Produtos das cores AMARELO, terão um desconto de 10%.
	update produto
	set valor = valor * 0.9
	where cor = "amarelo";

	--Exibição da tabela deverá conter os números no seguinte formato Brasileiro.
	 Select format(valor,2,'de_DE') From produto;