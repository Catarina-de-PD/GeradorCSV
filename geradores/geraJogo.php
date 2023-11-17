<?php
/* Geração de arquivo CSV */
include('../conexaoBD.php');

try {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("select * from jogos order by idJogo");
    $stmt->execute();

    $fp = fopen('../arquivos/arquivoJogo.csv', 'w');
    
    $colunasTitulo = array("idJogo", "nome", "preco", "descricao", "produtor");

    fputcsv($fp, $colunasTitulo);

    while ($row = $stmt->fetch()) {
        $idJogo = $row["idJogo"];
        $nome = $row["nome"];
        $preco = $row["preco"];
        $descricao = $row["descricao"];
        $produtor = $row["produtor"];

        $lista = array (
            array($idJogo, $nome, $preco, $descricao, $produtor),
        );
        
        foreach ($lista as $linha) {
            fputcsv($fp, $linha);
        }        
    }

    $msg = "Arquivo gerado: arquivoJogo.csv";    
    fclose($fp);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Jogos em CSV</title>
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