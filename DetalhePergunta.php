<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $conteudo = file_get_contents("perguntas.txt");
    $flag = false;
    foreach (preg_split("/((\r?\n)|(\r\n?))/", $conteudo) as $linha) {
        $array = explode(";", $linha);
        if ($array[0] === $id) {
            $flag = true;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhe Pergunta</title>
</head>
<body>
    <h1>Detalhe Pergunta</h1>
    <br>
<a href="CriarPergunta.php">Criar Pergunta</a><br>
<a href="AlterarPergunta.php">Alterar Pergunta</a><br>
<a href="ListarPerguntas.php">Listar Perguntas</a><br>
<a href="ExcluirPergunta.php">Excluir Pergunta</a><br>
<a href="DetalhePergunta.php">Detalhe de Pergunta</a><br>
<br>
<form action="DetalhePergunta.php" method="POST">
    <label for="id">Id:</label>
    <input type="number" id="id" name="id"><br>
    <input type="submit" value="Buscar">
</form>
<?php
    if(!empty($flag) && !empty($linha) && $flag !== false){
        echo $linha;
    }
?>
<br>
</body>
</html>