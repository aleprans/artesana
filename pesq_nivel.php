<?php

include_once('connect.php');

function retorna($usuario, $connect) {
    $sql = "SELECT usuario, nivel, nome FROM usuarios WHERE usuario = '$usuario';";
    $resultado = mysqli_query($connect, $sql);
    $row_usuario = mysqli_fetch_assoc($resultado);
    $dados['nivel'] = $row_usuario['nivel'];
    $dados['usuario'] = $row_usuario['usuario'];
    $dados['nome'] = $row_usuario['nome'];

    return json_encode($dados);
}

if (isset($_GET['usuario'])) {
    echo retorna($_GET['usuario'], $connect);
}

?>