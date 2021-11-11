<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta = $_POST["pergunta"];
    $pontos = $_POST["pontos"];
    $dificuldade = $_POST["dificuldade"];
    if (!file_exists("perguntas.txt")) {
        $cabecalho = "id;pergunta;pontos;dificuldade\n";
        file_put_contents("perguntas.txt", $cabecalho);
    }
    $id = 1;
    $line = '';
    $f = fopen('perguntas.txt', 'r');
    $cursor = -1;
    fseek($f, $cursor, SEEK_END);
    $char = fgetc($f);
    while ($char === "\n" || $char === "\r") {
        fseek($f, $cursor--, SEEK_END);
        $char = fgetc($f);
    }
    while ($char !== false && $char !== "\n" && $char !== "\r") {
        $line = $char . $line;
        fseek($f, $cursor--, SEEK_END);
        $char = fgetc($f);
    }
    $array = explode(";", $line);
    $id = ((int) $array[0]) + 1;
    $txt = $id . ";" . $pergunta . ";" . $pontos . ";" . $dificuldade . "\n";
    file_put_contents("perguntas.txt", $txt, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Pergunta</title>
</head>
<body>
    <h1>Criar Pergunta</h1>
    <br>
<a href="CriarPergunta.php">Criar Pergunta</a><br>
<a href="AlterarPergunta.php">Alterar Pergunta</a><br>
<a href="ListarPerguntas.php">Listar Perguntas</a><br>
<a href="ExcluirPergunta.php">Excluir Pergunta</a><br>
<a href="DetalhePergunta.php">Detalhe de Pergunta</a><br>
<br>
<form action="CriarPergunta.php" method=POST>
    <label for="pergunta">Pergunta:</label>
    <input type="text" id="pergunta" name="pergunta"><br>
    <label for="pontos">Quantidade de pontos:</label>
    <input type="number" id="pontos" name="pontos"><br>
    <label for="dificuldade">Dificuldade:</label>
    <select id="dificuldade" name="dificuldade">
    <option value="Fácil">Fácil</option>
    <option value="Média">Média</option>
    <option value="Difícil">Difícil</option>
    <option value="Muito Difícil">Muito Difícil</option>
    <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>