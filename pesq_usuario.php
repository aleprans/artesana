<?php

include_once('connect.php');

function retorna($usuario, $connect) {
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($connect, $sql);
    $row_usu = mysqli_fetch_assoc($resultado);
    $dados['id_usu'] = $row_usu['id_usuario'];
    $dados['nome'] = $row_usu['nome'];
    $dados['niv'] = $row_usu['nivel'];

    return json_encode($dados);
}

function retorna2($id_usuario, $connect) {
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
    $resultado = mysqli_query($connect, $sql);
    $row_usu = mysqli_fetch_assoc($resultado);
    $dados['id_cli'] = $row_usu['id_usuario'];
    $dados['nome'] = $row_usu['nome'];
    $dados['usuario'] = $row_cliente['usuario'];

    return json_encode($dados);
}

if (isset($_GET['usuario'])) {
    echo retorna($_GET['usuario'], $connect);
}



if (isset($_GET['id_usuario'])) {
    echo retorna2($_GET['id_usuario'], $connect);
}
?>