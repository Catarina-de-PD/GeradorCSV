<?php
/* Geração de arquivo CSV */
include('../conexaoBD.php');

try {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("select * from vendas order by idVendas");
    $stmt->execute();

    $fp = fopen('../arquivos/arquivoVendas.csv', 'w');
    
    $colunasTitulo = array("idVendas", "idCliente", "idJogo", "quantidade");

    fputcsv($fp, $colunasTitulo);

    while ($row = $stmt->fetch()) {
        $idVendas = $row["idVendas"];
        $idCliente = $row["idCliente"];
        $idJogo = $row["idJogo"];
        $quantidade = $row["quantidade"];

        $lista = array (
            array($idVendas, $idCliente, $idJogo, $quantidade)
        );
        
        foreach ($lista as $linha) {
            fputcsv($fp, $linha);
        }        
    }

    $msg = "Arquivo gerado: arquivoVendas.csv";    
    fclose($fp);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Vendas em CSV</title>
    <style type="text/css">
        body{
            background-color: rgb(32, 33, 36);
            align-items: center;
            justify-content: center;
            margin: 20;
            color: rgb(202, 200, 200);
        }
        
        input{
            background-cplor: rgb(202, 200, 200);
            color: rgb(74, 70, 70);
            padding: 10px;
            margin: 5px;
        }
        
    </style>
</head>

<body>
    <h1>Listagem de Jogos em CSV</h1>
    <?= $msg ?>
    <br><br>
    <input type="button" value="Voltar à página inicial" onClick="window.open('../index.php', '_top')" > 
</body>
</html>