<?php
$linhas = array();
$colunas = array();
$arquivoPergunta = fopen("perguntas.txt", "r") or die("Erro na abertura do arquivo");
$cabecalho =  fgets($arquivoPergunta);
$colunas = explode(";", $cabecalho);
while (!feof($arquivoPergunta)) {
    $linhas[] = fgets($arquivoPergunta);
}
fclose($arquivoPergunta);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Pergunta</title>
</head>
<body>
    <h1>Listar Perguntas</h1>
    <br>
<a href="CriarPergunta.php">Criar Pergunta</a><br>
<a href="AlterarPergunta.php">Alterar Pergunta</a><br>
<a href="ListarPerguntas.php">Listar Perguntas</a><br>
<a href="ExcluirPergunta.php">Excluir Pergunta</a><br>
<a href="DetalhePergunta.php">Detalhe de Pergunta</a><br>
<br>
<table>
    <tr>
    <?php
    foreach($colunas as $coluna){
        echo "<th>$coluna</th>";
    }
    echo "</tr>";
    foreach ($linhas as $linha) {
        echo "<tr>";
        $colunas1 = array();
        $colunas1 = explode(";", $linha);
        foreach ($colunas1 as $coluna){
            echo "<td>$coluna</td>";
        }
        echo "</tr>";
    }
    ?>
<br>
</body>
</html>