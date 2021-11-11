<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $conteudo = file_get_contents("perguntas.txt");
    foreach (preg_split("/((\r?\n)|(\r\n?))/", $conteudo) as $linha) {
        if (strpos($linha, $id) !== false) {
            $pergunta = $_POST["pergunta"];
            $pontos = $_POST["pontos"];
            $dificuldade = $_POST["dificuldade"];
            $txt = $id . ";" . $pergunta . ";" . $pontos . ";" . $dificuldade;
            $conteudo = str_replace($linha, $txt, $conteudo);
        }
    }
    file_put_contents("perguntas.txt", $conteudo);
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alterar Pergunta</title>
</head>
<body>
    <h1>Alterar Pergunta</h1>
    <br>
<a href="CriarPergunta.php">Criar Pergunta</a><br>
<a href="AlterarPergunta.php">Alterar Pergunta</a><br>
<a href="ListarPerguntas.php">Listar Perguntas</a><br>
<a href="ExcluirPergunta.php">Excluir Pergunta</a><br>
<a href="DetalhePergunta.php">Detalhe de Pergunta</a><br>
<br>
<form action="AlterarPerguntaAux.php" method="POST">
    <label for="id">Id:</label>
    <input type="number" id="id" name="id"><br>
    <input type="submit" value="Buscar">
</form>
<br>
</body>
</html>