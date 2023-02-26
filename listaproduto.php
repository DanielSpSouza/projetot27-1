<?php
include("conectadb.php");
$sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
$resultado = mysqli_query($link, $sql);
$ativo = 's';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $ativo = $_POST['ativo'];
    if($ativo == 's'){
        $sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
        $resultado = mysqli_query($link, $sql);
        
         
    }
    else{
        $sql = "SELECT * FROM produtos WHERE pro_ativo = 'n'";
        $resultado = mysqli_query($link, $sql);
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>LISTA PRODUTO</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <form action="listaproduto.php" method="post">
        <input type="radio" name="ativo" value='s' required onclick="submit()" <?=$ativo=='s'?"checked":"";?>>ATIVOS<br>
        <input type="radio" name="ativo" value='n' required onclick="submit()" <?=$ativo=='n'?"checked":"";?>>INATIVOS
    </form>
    <div class="container">
        <table border="1">
            <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>QUANTIDADE</th>
                    <th>PRECO</th>
                    <th>ALTERAR</th>
                    <th>ATIVO</th>
            </tr>
            <?php
                while($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><?= $tbl[3]?></td>
                        
                        <!-- number format traz o formato com 2 casas após a virgula e trocando . por , na apresentacao -->
                        <td>R$ <?= number_format($tbl[4],2,',', '.')?></td>
                       
                        <td><a href="alteraproduto.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                        <td><?= $check = ($tbl[5] == 's')?"SIM":"NÃO"?></td>
                    </tr>
                    <?php
                }
                ?>
        </table>
    </div>
</body>
</html>