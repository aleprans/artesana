<?php
include_once('connect.php');

if (isset($_GET['id_mat'], $connect)) {
    echo retorna($_GET['id_mat'], $connect);

}

function retorna($material, $connect){
    $sql = "DELETE FROM materiais WHERE id_material = '$material'";
    $resultado = mysqli_query($connect, $sql);

if ($resultado) {
    echo json_encode(['status'=>true, 'msg'=>'Material Excluido com Sucesso!']);
    mysqli_close($connect);
}else {
    echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
    mysqli_close($connect);
}
}
?>