<?php

include_once('connect.php');

$id_prod = mysqli_escape_string($connect, $_POST['id_produto']);
$produto = mysqli_escape_string($connect, $_POST['produto']);
$custo = mysqli_escape_string($connect, $_POST['custo']);
$desc = mysqli_escape_string($connect, $_POST['desc']);
$venda = mysqli_escape_string($connect, $_POST['venda']);

if ($id_prod > 0) {
    $sql = "UPDATE produtos SET produto = '$produto', custo = '$custo', descricao = '$desc', venda = '$venda' WHERE  id_produto = '$id_prod';";
    $resultado = mysqli_query($connect, $sql);
} else {
    
    $sql = "INSERT INTO produtos(produto, custo, venda, descricao) VALUES ('$produto', '$custo', '$venda', $desc');";
    $resultado = mysqli_query($connect, $sql);
}

if (!$resultado) {
    echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
    mysqli_close($connect);
}else {
    echo json_encode(['status'=>true, 'msg'=>'Dados Inseridos com Sucesso!']);
    mysqli_close($connect);
}

?>