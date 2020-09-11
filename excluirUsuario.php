<?php
include_once('connect.php');

if (isset($_GET['id_usu'], $connect)) {
    echo retorna($_GET['id_usu'], $connect);

}

function retorna($id_usuario, $connect){
    
    $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
    $resultado = mysqli_query($connect, $sql);

    if ($resultado) {
        echo json_encode(['status'=>true, 'msg'=>'Dados Excluidos com Sucesso!']);
        mysqli_close($connect);
    }else {
        echo json_encode(['status'=>false, 'msg'=>'Conexão Falhou!']);
        mysqli_close($connect);
    }
}
?>