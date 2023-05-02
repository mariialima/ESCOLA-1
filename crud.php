<?php
include("conecta.php");
$matricula = $_POST["matricula"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];

if(isset($_POST["gravar"]))

{
    $comando = $pdo->prepare("INSERT INTO alunos VALUES ($matricula,'$nome', $idade)");
    $resultado = $comando->execute();
    header("Location:cadastro.html");

}

if(isset($_POST["excluir"]))
{
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula =$matricula");
    $resultado = $comando->execute();
    header("Location:cadastro.html");
}

if(isset($_POST["alterar"]))
{
    $comando = $pdo->prepare("UPDATE alunos SET nome ='$nome', idade=$idade WHERE matricula=$matricula");
    $resultado = $comando->execute();
    header("Location:cadastro.html");
}

if(isset($_POST["listar"]))
{
    $comando = $pdo->prepare("SELECT * FROM alunos WHERE matricula = $matricula");
    $resultado = $comando->execute();

    while ($linhas = $comando->fetch())
    {
        $n = $linhas["nome"];
        $m = $linhas["matricula"];
        $i = $linhas["idade"];
        if($i>18)
        {
        echo("<div class = 'D1'> <b>$m</b> $n $i <br> <br>");
        }
        else
        {
            header("Location:cadastro.html");
        }
    }
}
  
?>
