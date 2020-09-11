<?php
include_once('connect.php');

$id_usuario = mysqli_escape_string($connect, $_POST['id_usuario']);
$usuario = mysqli_escape_string($connect, $_POST['usuario']);
$nome = mysqli_escape_string($connect, $_POST['nome']);
$senha = mysqli_escape_string($connect, $_POST['senha']);
$nivel = mysqli_escape_string($connect, $_POST['nivel']);



if ($id_usuario > 0) {
    if($senha == null){
        $sql = "UPDATE usuarios SET usuario = '$usuario', nome = '$nome', nivel = '$nivel'  WHERE  id_usuario = '$id_usuario';";
    }else{
    $sql = "UPDATE usuarios SET usuario= '$usuario', nome = '$nome', senha = md5('$senha'), nivel = '$nivel'  WHERE  id_usuario = '$id_usuario';";
    }
    $resultado = mysqli_query($connect, $sql);
} else {
    $sql = "INSERT INTO usuarios(usuario, senha, nome, nivel) VALUES ('$usuario', md5(1234), '$nome', '$nivel');";
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