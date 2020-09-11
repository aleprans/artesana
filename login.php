<?php
session_start();

include_once('connect.php');

$usuario = mysqli_real_escape_string($connect, $_POST['usuario']);
$senha = mysqli_real_escape_string($connect, $_POST['senha']);

    $sql = "SELECT id_usuario, nivel FROM usuarios WHERE usuario = '$usuario' and senha = md5('$senha');";
    $result = mysqli_query($connect, $sql);
    $rows = mysqli_fetch_assoc($result);

    $nrow = mysqli_num_rows($result);

    if ($nrow > 0) {
        $_SESSION['usuario']['usu'] = $usuario;
        $_SESSION['usuario']['niv'] = $rows['nivel'];
        echo json_encode(['status'=>'logado', 'msg'=>'Usuario logado!']);
        mysqli_close($connect);
        exit;
    }else {
        echo json_encode(['status'=>'falha', 'msg'=>"Usuario ou Senha Invalido!"]);
        mysqli_close($connect);
    }
?>