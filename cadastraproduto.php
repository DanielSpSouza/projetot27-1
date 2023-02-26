<?php
include("conectadb.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];    


$sql="INSERT INTO produtos(pro_nome, pro_descricao, pro_quantidade, pro_preco, pro_ativo) VALUES('$nome', '$descricao', '$quantidade', '$preco', 's')";
mysqli_query($link,$sql);
header("Location: listaproduto.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>CADASTRAR PRODUTOS</title>
</head>
<body>
        <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <div>
            <form action="cadastraproduto.php" method="post">
                <label>NOME</label>
                <input type="text" name="nome">
                <br></br>
                <label>DESCRIÇÃO</label>
                <input type="text" name="descricao">
                <br></br>
                <label>QUANTIDADE</label>
                <input type="number" name="quantidade">
                <br></br>
                <label>PRECO</label>
                <input type="number" name="preco">
                <br></br>

                <!-- BLOCO DE CÓDIGO NOVO -->
                <!-- <label>IMAGEM I</label>
                <input type="file" name="file1" id="img1" onchange="foot1()">
                <img src="img/semimg.gif" width="50px" id="foto1a"> -->

                <input type="submit" value="CADASTRAR">

            </form>
        </div>
</body>
</html>