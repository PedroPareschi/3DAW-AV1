<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $arquivoPerguntaIn = fopen("perguntas.txt", "r") or die("Erro na abertura do arquivo");
    while (!feof($arquivoPerguntaIn)) {
        $linhas[] = fgets($arquivoPerguntaIn);
    }
    fclose($arquivoPerguntaIn);

    $arquivoPerguntaOut = fopen("perguntas.txt", "w") or die("Erro na abertura do arquivo");
    foreach($linhas as $linha) {
        $colunaDados = explode(";", $linha);
        if ($colunaDados[0] != $id) {
            $txt = $linha;
            fwrite($arquivoPerguntaOut, $txt);
        }
    }
    fclose($arquivoPerguntaOut);
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir Pergunta</title>
</head>
<body>
    <h1>Excluir Pergunta</h1>
    <br>
<a href="CriarPergunta.php">Criar Pergunta</a><br>
<a href="AlterarPergunta.php">Alterar Pergunta</a><br>
<a href="ListarPerguntas.php">Listar Perguntas</a><br>
<a href="ExcluirPergunta.php">Excluir Pergunta</a><br>
<a href="DetalhePergunta.php">Detalhe de Pergunta</a><br>
<br>
<form action="ExcluirPergunta.php" method="POST">
    <label for="id">Id:</label>
    <input type="number" id="id" name="id"><br>
    <input type="submit" value="Buscar">
</form>
<br>
</body>
</html>