<?php

include_once('connect.php');

function retorna($cliente, $connect) {
    $sql = "SELECT * FROM clientes WHERE celular = '$cliente'";
    $resultado = mysqli_query($connect, $sql);
    $row_cliente = mysqli_fetch_assoc($resultado);
    $dados['id_cli'] = $row_cliente['id_cliente'];
    $dados['nom'] = $row_cliente['cliente'];
    $dados['tel'] = $row_cliente['celular'];
    $dados['end'] = $row_cliente['endereco'];
    $dados['num'] = $row_cliente['num'];
    $dados['bar'] = $row_cliente['bairro'];
    $dados['cid'] = $row_cliente['cidade'];
    $dados['est'] = $row_cliente['uf'];

    return json_encode($dados);
}

function retorna2($cliente, $connect) {
    $sql = "SELECT * FROM clientes WHERE id_cliente = '$cliente'";
    $resultado = mysqli_query($connect, $sql);
    $row_cliente = mysqli_fetch_assoc($resultado);
    $dados['id_cli'] = $row_cliente['id_cliente'];
    $dados['nom'] = $row_cliente['cliente'];
    $dados['tel'] = $row_cliente['celular'];
    $dados['end'] = $row_cliente['endereco'];
    $dados['num'] = $row_cliente['num'];
    $dados['bar'] = $row_cliente['bairro'];
    $dados['cid'] = $row_cliente['cidade'];
    $dados['est'] = $row_cliente['uf'];

    return json_encode($dados);
}

if (isset($_GET['cliente'])) {
    echo retorna($_GET['cliente'], $connect);
}



if (isset($_GET['id_cliente'])) {
    echo retorna2($_GET['id_cliente'], $connect);
}
?>