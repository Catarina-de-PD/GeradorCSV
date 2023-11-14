<?php
/* Geração de arquivo CSV */
include("../conexaoBD.php");

try {
    $stmt = $pdo->prepare("select * from clientes order by idCliente");
    $stmt->execute();

    $fp = fopen('arquivoCliente.csv', 'w');
    
    $colunasTitulo = array("idCliente", "nome", "cpf", "cep");

    fputcsv($fp, $colunasTitulo);

    while ($row = $stmt->fetch()) {
        $idCliente = $row["idCliente"];
        $nome = $row["nome"];
        $cpf = $row["cpf"];
        $cep = $row["cep"];

        $lista = array (
            array($idCliente, $nome, $cpf, $cep)
        );
        
        foreach ($lista as $linha) {
            fputcsv($fp, $linha);
        }        
    }

    $msg = "Arquivo gerado: arquivCliente.csv";    
    fclose($fp);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Cliente em CSV</title>
</head>

<body>
    <h1>Listagem de Alunos em CSV</h1>
    <?= $msg ?>
</body>
</html>