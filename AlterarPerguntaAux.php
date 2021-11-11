<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $conteudo = file_get_contents("perguntas.txt");
        $array = [];
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $conteudo) as $linha) {
            $testarray = explode(";", $linha);
            if (strpos($testarray[0], $id) !== false) {
               $array = $testarray;
            }
        }
        if(sizeof($array) == 0){
            die("Pergunta não encontrado");
        }
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
<form action="AlterarPergunta.php" method=POST>
    <label for="id">Id:</label>
    <input type="text" id="id" name="id" value="<?php echo $array[0]; ?>"><br>
    <label for="pergunta">Pergunta:</label>
    <input type="text" id="pergunta" name="pergunta" value="<?php echo $array[1]; ?>"><br>
    <label for="pontos">Quantidade de pontos:</label>
    <input type="number" id="pontos" name="pontos" value="<?php echo $array[2]; ?>"><br>
    <label for="dificuldade">Dificuldade:</label>
    <select id="dificuldade" name="dificuldade">
    <?php
    $options = array("Fácil", "Média", "Difícil", "Muito Difícil");
    $output = '';
    for($i=0; $i<count($options); $i++) {
      $output .= '<option ' 
                 . ( $array[3] == $options[$i] ? 'selected="selected"' : '' ) . '>' 
                 . $options[$i] 
                 . '</option>';
    }
    echo $output;
    ?>
    <br>
    <br><br>
    <input type="submit" value="Alterar">
</form>
<br>
</body>
</html>