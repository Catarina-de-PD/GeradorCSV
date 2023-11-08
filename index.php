<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de arquivo CSV</title>
    <style type="text/css">
        body{
            background-color: rgb(32, 33, 36);
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        
        input{
            background-cplor: rgb(202, 200, 200);
            color: rgb(74, 70, 70);
            padding: 10px;
            margin: 5px;
        }
        h1{
            color: rgb(202, 200, 200);
        }

        img{
            width: 400px;
        }
        
        .divCentro{
            width: 400px;
            background-color: rgb(74, 70, 70);
            margin: 30px auto auto auto;
            text-align: center;
            padding: 20px;
            border: 1px solid rgb(74, 70, 70);
            border-radius: 2%;   
        }
        
    </style>
</head>
<body>
    <div class="divCentro">
        <h1>Gerador de arquivo CSV</h1>
        <br>
        <img src="imagem/controle.png">
        <br>
        <input type="button" id="btnGerarJogos" value="Gerar arquivo de Jogos">
        <br>
        <input type="button" id="btnGerarClientes" value="Gerar arquivo de Clientes">
        <br>
        <input type="button" id="btnGerarVendas" value="Gerar arquivo de Vendas">
    </div>
</body>
</html>