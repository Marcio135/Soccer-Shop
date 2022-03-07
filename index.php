<?php

    include("conexao.php");
 
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
 ini_set('default_charset','UTF-8');
?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soccer Shop</title>
</head>
<body>
    <center>
    <h1>Bem Vindo!</h1>
    <h2>Soccer Shop</h2>
    </center>


    <form action="">
        <input name="buscar" placeholder="Digite um produto ou cor" type="text"/>
        <button type="submit">Filtrar</button>
    </form>
    <br>
<div>
    <table width="700px" border="3" id="tabela">
        <tr>
            <th>Produto</th>
            <th>Cor</th>
            <th>Preço</th>
        </tr>
        <?php
        if (!isset($_GET['buscar'])) {
            ?>
        <tr>
            <td colspan="3"> Digite para fazer a pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET ['buscar']);
            
            $sql_code = "SELECT *
                FROM  produto 
                WHERE nome LIKE '%{$pesquisa}%' 
                OR cor like '%{$pesquisa}%'";
            
            
            $sql_query = $mysqli->query($sql_code) or die("Error ao consultar! " . "$mysqli->error");

            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan = "3"> Nenhum resultado encontrado...</td>
            </tr>
            <?php 
            } else {
                while($dados = $sql_query->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['cor']; ?></td>
                        <td>R$ <?php echo $dados['valor']; ?></td>
                    </tr>
                    <?php

                }

            }
            ?>
        <?php
        } ?>
    </table>

    <h3>Lista de produtos</h3>
    <ul>
        <li>Chuteira Campo</li>
        <li>Chuteira Futsal</li>
        <li>Chuteira Society</li>
        <li>Bermuda</li>
        <li>Bola Basquete</li>
        <li>Blusa Termica</li>
        <li>Luva</li>
        <li>Camiseta</li>
        <li>Bola Futsal</li>
    </ul>
</div>
</body>
</html>

