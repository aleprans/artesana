<?php

include_once('connect.php');

$id_material = mysqli_escape_string($connect, $_POST['id_material']);
$id_tipo = mysqli_escape_string($connect, $_POST['id_tipo']);
$desc = mysqli_escape_string($connect, $_POST['desc']);
$comp = mysqli_escape_string($connect, $_POST['comp']);
$val = mysqli_escape_string($connect, $_POST['val']);


if ($id_material != 0) {
    $sql = "UPDATE materiais SET id_tipo = '$id_tipo', desc_mat = '$desc', largura = '$comp', valor = '$val' WHERE  id_material = '$id_material';";
    $resultado = mysqli_query($connect, $sql);
} else {
    $sql = "INSERT INTO materiais (id_tipo, desc_mat, largura, valor) VALUES ('$id_tipo', '$desc', '$comp', '$val');";
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